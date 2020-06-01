<?php
namespace AppBundle\Controller;

use AppBundle\Entity\Tests;
use AppBundle\Entity\TestsAnswers;
use AppBundle\Entity\TestsQuestions;
use AppBundle\Service\MenuGenerate;
use DateTime;
use DateTimeZone;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Fixtures\Bundles\XmlBundle\Entity\Test;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class GoController extends Controller
{
    /**
     * @Route(path = "/go/{id}", name = "go")
     */
    public function goIndex(Tests $test) {
        return $this->render("go/index.html.twig", array('test' => $test));
    }

    /**
     * @Route(path = "/go/{test}/start", name = "go.startAction")
     */
     public function startAction(Request $request, EntityManagerInterface $em, Tests $test) {
         $questions = $em->createQuery("select q from AppBundle:TestsQuestions q where q.ntestnumber = :test")
             ->setParameter("test", $test->getNkey())
             ->getArrayResult();
         $testId = $em->createQuery("select ta.testId + 1 from AppBundle:TestsAnswers ta where ta.testId is not null order by ta.testId desc")
             ->setMaxResults(1)
             ->getOneOrNullResult();

         if (!$testId) {
             $testId[1] = 0;
         }

         if ($test->getNtesttype() != null && $test->getNtesttype() != 2500) {
            shuffle($questions);
         }

         $session = $this->get("session");
         $session->set("questions", $questions);
         $session->set("globalMaxBalls", 0);
         $session->set("globalBalls", 0);
         $session->set("groupId", $testId[1]);

         return $this->redirectToRoute("go.testAction", array(
             'idQuestion' => 0,
             'test' => $test->getNkey()
         ));
        }
    /**
     * @Route(path = "/go/{test}/question/{idQuestion}", name = "go.testAction")
     */
        public function testAction(Request $request, Tests $test, $idQuestion, EntityManagerInterface $em){
            $session = $this->get("session");
            $questions = $session->get("questions");
            $groupId = $session->get("groupId");

            if (!$questions) {
                return $this->redirectToRoute("home");
            }

            if ($request->request->count() !== 0) {
                $requestData = $request->request->all();


                $maxBalls = 0;
                if (!$questions[$idQuestion - 1]['bdostup']) {

                    for ($index = 1; $index <= 10; ++$index) {
                        $property = "nw{$index}";
                        if (isset($questions[$idQuestion - 1][$property])) {
							if ($questions[$idQuestion - 1][$property] >= 0) {
								$maxBalls += (int) $questions[$idQuestion - 1][$property];
							}
                        }
                    }


                } else {

                    $max =  $questions[$idQuestion - 1]['nw1'];
                    for ($index = 2; $index <= 10; ++$index) {
                        $property = "nw{$index}";
                        if (isset($questions[$idQuestion - 1][$property])) {
                            $num =  (int)$questions[$idQuestion - 1][$property];
                            if ($max < $num) {
                                $max = $num;
                            }
                        }
                    }
                    $maxBalls = $max;
                }

                $globalMaxBalls = $session->get("globalMaxBalls");
                $globalMaxBalls += $maxBalls;
                $session->set("globalMaxBalls", $globalMaxBalls);



                $sumBallsOfQuestion = 0;
                foreach($requestData as $key => $value) {
                    $lastSymbol = substr("$key", -1);
                    $property = "nw{$lastSymbol}";
                    if (isset($questions[$idQuestion - 1][$property])) {
                        $sumBallsOfQuestion += (int) $questions[$idQuestion - 1][$property];
                    }
                }

                $flag = true;
                if ($maxBalls == $sumBallsOfQuestion) {
                    $globalBalls = $session->get("globalBalls");
                    $globalBalls += $sumBallsOfQuestion;
                    $session->set("globalBalls", $globalBalls);
                    $flag = false;
                }

                try {
                    $em->beginTransaction();
                    $testAnswer = new TestsAnswers();
                    $testAnswer->setNtestnumber($test->getNkey());
                    $testAnswer->setNstaffkey($this->getUser()->getNuserkey());
                    $testAnswer->setNanswernum($idQuestion - 1);
                    $testAnswer->setTestId($groupId);

                    $testAnswer->setTestDate(new DateTime());
                    //dump( $questions[$idQuestion - 1]['nkey']);
                    $question = $em->find(TestsQuestions::class, $questions[$idQuestion - 1]['nkey']);
                    $testAnswer->setQuestion($question);

                    if (!$flag) {
                        foreach($requestData as $key => $value) {
                            $lastSymbol = substr("$key", -1);
                            $property = "nw{$lastSymbol}";
                            if (isset($questions[$idQuestion - 1][$property])) {
                                $prop = "setAns{$lastSymbol}";
                                $testAnswer->$prop($questions[$idQuestion - 1][$property]);
                            }
                        }
                    }

                    $em->persist($testAnswer);
                    $em->flush();
                    $em->commit();
                } catch (Exception $ex) {
                    $em->rollback();
                }


//                dump($globalMaxBalls);
//                dump($sumBallsOfQuestion);
//                dump($globalBalls);
//                dump($requestData);

                return $this->redirectToRoute("go.testAction", array(
                    'test' => $test->getNkey(),
                    'idQuestion' => $idQuestion,
                ));
            }

            if ($idQuestion == count($questions)) {
                $globalBalls = $session->get("globalBalls");
                $globalMaxBalls = $session->get("globalMaxBalls");
                $session->remove("globalBalls");
                $session->remove("globalMaxBalls");
                $session->remove("questions");
                $session->remove("groupId");


                $message = '...';

                $tableScals = array(
                    array('min' => $test->getNmin1(), 'max' => $test->getNmax1(), 'message' => $test->getCvalue1()),
                    array('min' => $test->getNmin2(), 'max' => $test->getNmax2(), 'message' => $test->getCvalue2()),
                    array('min' => $test->getNmin3(), 'max' => $test->getNmax3(), 'message' => $test->getCvalue3()),
                    array('min' => $test->getNmin4(), 'max' => $test->getNmax4(), 'message' => $test->getCvalue4()),
                    array('min' => $test->getNmin5(), 'max' => $test->getNmax5(), 'message' => $test->getCvalue5()),
                );

                foreach ($tableScals as $scal) {
                    //dump($scal);
                    if ($globalBalls >= $scal['min'] && $scal['max'] >= $globalBalls) {
                        $message = $scal['message'];
                        break;
                    }
                }

                return $this->render("go/result.html.twig", ['message' => $message, 'test' => $test, 'user' => $this->getUser(), 'userBalls' => $globalBalls, 'maxBalls' => $globalMaxBalls]);
            }


            return $this->render("go/start.html.twig", array(
                'test' => $test,
                'question' => $questions[$idQuestion],
                'currentNumberQuestion' => $idQuestion,
                'maxQuestions' => count($questions) - 1,
                'nextQuestion' => $idQuestion + 1
            ));
        }

    /**
     * @Route(path = "/go/finish/", name = "go.finishAction")
     */
    public function finishAction() {
        $session = $this->get("session");
        $session->clear();
        return $this->redirectToRoute("home");

    }
}