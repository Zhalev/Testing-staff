<?php

namespace AppBundle\Controller;
use AppBundle\Entity\Tests;
use AppBundle\Entity\TestsQuestions;
use AppBundle\Service\MenuGenerate;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityNotFoundException;
use Monolog\Logger;
use Psr\Log\LoggerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * @Security("has_role('ROLE_ADMIN') or has_role('ROLE_MODERATOR')")
 *
 */
class AdminController extends Controller
{

    /**
     * @Route(path = "/admin/{id}/edit", name = "admin.editAction", requirements={"id": "\d+"})
     */
    public function editAction(Request $request, EntityManagerInterface $em, LoggerInterface $logger, $id) {
        $test = $em->find(Tests::class, $id);
        if (!$test) {
            $logger->info("entities not found");
            return $this->redirectToRoute("home");
        }

        if ( ( $this->isGranted("ROLE_MODERATOR") && !$test->getOrganization() ) || ( $this->isGranted("ROLE_MODERATOR") && $test->getOrganization()->getNelementkey() != $this->getUser()->getOrganization()->getNelementkey() )) {
            return $this->redirectToRoute("home");
        }

        $dql = "select question from AppBundle:TestsQuestions question where question.ntestnumber = :keyTest and question.cquestion LIKE :nameQuestion ";
        //dump($request->request->get("nameQuestion "));
        $nameQuestion = $request->query->get("nameQuestion");
        $keyQuestion = $request->query->get("keyQuestion");
        $query = $em->createQuery($dql)
                ->setParameter("nameQuestion", "%$nameQuestion%")
                ->setParameter("keyTest", $test->getNkey());

        if (!empty($keyQuestion) && $keyQuestion != '-1') {
            $dql .= " and question.nkey = :keyQuestion ";
            $query = $em->createQuery($dql)
                ->setParameter("nameQuestion", "%$nameQuestion%")
                ->setParameter("keyTest", $test->getNkey())
                ->setParameter("keyQuestion", $keyQuestion);
        }

        $result = $em->createQuery("select question from AppBundle:TestsQuestions question where question.ntestnumber = :keyTest")
            ->setParameter("keyTest", $test->getNkey())->getResult();

        $scalOptions = array();
        for ($startIndex = 1; $startIndex <= 5; ++$startIndex) {
            $propMin = "getNmin{$startIndex}";
            $propMax = "getNmax{$startIndex}";
            $getValue = "getCvalue{$startIndex}";

            if (method_exists($test, $propMin) && method_exists($test, $propMax) && method_exists($test, $getValue)) {
                $scalOptions[] = array( "nmin" => $test->$propMin(), "nmax" => $test->$propMax(), 'value' => $test->$getValue());
            }

        }

        //dump($scalOptions);


        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 6);
        return $this->render("admin/index2.html.twig", array('scals' => $scalOptions, 'questionKeys' => $result,'keyQuestion' => $keyQuestion, 'nameQuestion' => $nameQuestion, 'pagination' => $pagination, 'test' => $test));

    }


    /**
     * @Route(path="/admin/{idTest}/delete", name="admin.deleteAction")
     * @Method(methods={"GET"})
     */
    public function deleteAction(Request $request, LoggerInterface $logger, EntityManagerInterface $em, $idTest){
        $question =$em->find(TestsQuestions::class, (int) $idTest);

        if (!$question) {
            $logger->info("entity not found");
            return new Response("error");
        }

        $test =$em->find(Tests::class, (int) $question->getNtestnumber());
        if ( ( $this->isGranted("ROLE_MODERATOR") && !$test->getOrganization() ) || ( $this->isGranted("ROLE_MODERATOR") && $test->getOrganization()->getNelementkey() != $this->getUser()->getOrganization()->getNelementkey() )) {
            return $this->redirectToRoute("home");
        }

        try {

            $em->beginTransaction();
            $em->remove($question);
            $em->flush();
            $em->commit();

            $logger->info("entity remove");
        } catch (Exception $ex) {
            $logger->error($ex);
            $em->rollback();
        }
        return $this->redirectToRoute("admin.editAction", array("id" => (int) $question->getNtestnumber()));
    }

    /**
     * @Route(path="/admin/{idTest}/save", name="admin.saveAction")
     */
    public function saveAction(Request $request, EntityManagerInterface $em, Tests $idTest) {
        if (!$request->isMethod("post")) {
            return new Response("error");
        }
        if ( ( $this->isGranted("ROLE_MODERATOR") && !$idTest->getOrganization() ) || ( $this->isGranted("ROLE_MODERATOR") && $idTest->getOrganization()->getNelementkey() != $this->getUser()->getOrganization()->getNelementkey() )) {
            return $this->redirectToRoute("home");
        }

        $id = $request->request->get("id");
        $nameQuestion = $request->request->get("nameQuestion");
        $answer1 = $request->request->get("answer1");
        $answer2 = $request->request->get("answer2");
        $answer3 = $request->request->get("answer3");
        $answer4 = $request->request->get("answer4");
        $answer5 = $request->request->get("answer5");
        $answer6 = $request->request->get("answer6");
        $ballAnswer1 = (int)$request->request->get("ballAnswer1");
        $ballAnswer2 = (int)$request->request->get("ballAnswer2");
        $ballAnswer3 = (int)$request->request->get("ballAnswer3");
        $ballAnswer4 = (int)$request->request->get("ballAnswer4");
        $ballAnswer5 = (int)$request->request->get("ballAnswer5");
        $ballAnswer6 = (int)$request->request->get("ballAnswer6");

        try {
            $em->getConnection()->beginTransaction();
            $question = new TestsQuestions();
            if ($id != 0) {
                $question = $this->getDoctrine()->getRepository(TestsQuestions::class)->find((int)$id);
                if (!$question) {
                    throw $this->createNotFoundException("no found user");
                }
            }
            $question->setCquestion($nameQuestion);
            $question->setCanswer1($answer1);
            $question->setCanswer2($answer2);
            $question->setCanswer3($answer3);
            $question->setCanswer4($answer4);
            $question->setCanswer5($answer5);
            $question->setCanswer6($answer6);
            $question->setNw1($ballAnswer1);
            $question->setNw2($ballAnswer2);
            $question->setNw3($ballAnswer3);
            $question->setNw4($ballAnswer4);
            $question->setNw5($ballAnswer5);
            $question->setNw6($ballAnswer6);

            $question->setNtestnumber($idTest->getNkey());
            $em->persist($question);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("admin.editAction", array("id" => (int)$idTest->getNkey()));

    }

    /**
     * @Route(path="/admin/{idTest}/saveTest", name="admin.changeTestAction")
     * @param Request $request
     * @param EntityManager $em
     * @param $idTest
     * @throws \Exception
     * @internal param $idTest
     */
    public function saveTestAction(Request $request, EntityManagerInterface $em, Tests $idTest) {
        $testName = $request->request->get("nameTest");
        $testDesc = $request->request->get("test-desc");

        if ( ( $this->isGranted("ROLE_MODERATOR") && !$idTest->getOrganization() ) || ( $this->isGranted("ROLE_MODERATOR") && $idTest->getOrganization()->getNelementkey() != $this->getUser()->getOrganization()->getNelementkey() )) {
            return $this->redirectToRoute("home");
        }

        try {
            $em->getConnection()->beginTransaction();
            $test = new Tests();
            if ($idTest->getNkey() != 0) {
                $test = $this->getDoctrine()->getRepository(Tests::class)->find((int)$idTest->getNkey());

                if (!$test) {
                    throw $this->createNotFoundException("no found user");
                }
            }
            $test->setCtestname($testName);
            $test->setCmessage($testDesc);
            $em->persist($test);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("admin.editAction", array("id" => $test->getNkey()));
    }

    /**
     * @Route(path="/admin/{idTest}/saveScl", name="admin.saveScal")
     */
    public function saveScalAction(Request $request, EntityManagerInterface $em, Tests $idTest) {
        if (!$request->isMethod("post")) {
            return new Response("error");
        }

        if ( ( $this->isGranted("ROLE_MODERATOR") && !$idTest->getOrganization() ) || ( $this->isGranted("ROLE_MODERATOR") && $idTest->getOrganization()->getNelementkey() != $this->getUser()->getOrganization()->getNelementkey() )) {
            return $this->redirectToRoute("home");
        }

        try {
            $em->getConnection()->beginTransaction();
            $test = $idTest;

            for ($startIndex = 1; $startIndex <= 5; ++$startIndex) {
                $nmin = $request->request->get("nmin{$startIndex}");
                $nmax = $request->request->get("nmax{$startIndex}");
                $value = $request->request->get("value{$startIndex}");

                if (!$nmin && !$nmax && !$value) {
                    continue;
                }

                $setNMin = "setNmin{$startIndex}";
                $setNMax = "setNmax{$startIndex}";
                $setCvalue = "setCvalue{$startIndex}";

                if (method_exists($test, $setNMin) &&
                    method_exists($test, $setNMax) &&
                    method_exists($test, $setCvalue)) {

                    $test->$setNMin($nmin);
                    $test->$setNMax($nmax);
                    $test->$setCvalue($value);
                }
            }

            $em->persist($test);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("admin.editAction", array("id" => (int) $test->getNkey()));
    }
}
