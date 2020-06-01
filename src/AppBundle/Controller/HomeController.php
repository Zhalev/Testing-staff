<?php
/**
 * Created by PhpStorm.
 * User: pavel
 * Date: 29.08.17
 * Time: 2:09
 */

namespace AppBundle\Controller;
use AppBundle\AppBundle;
use AppBundle\Entity\DictionaryStructure;
use AppBundle\Entity\Tests;
use AppBundle\Entity\TestsQuestions;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends Controller
{

    /**
     * @Route(path = "/home/", name = "home")
     */
    public function homeAction(Request $request) {
        $testName = $request->query->get("testName");
        $typeTest = $request->query->get("type");
        $organization = $request->query->get("organizaiton");
        $dql = "select t from AppBundle:Tests t where t.ntesttype != 2501 and t.ctestname LIKE :testName ";
        //dump($request->query);
        $query = $this->getDoctrine()->getManager()->createQuery($dql);
        $query->setParameter("testName", "%{$testName}%");
        $flag = false;

        if (!empty($typeTest) && $typeTest != '-1') {
            $dql .= "and t.ntesttype = :typeTest ";
            //dump($dql);

            $query = $this->getDoctrine()->getManager()->createQuery($dql);
            //dump($query);
            $query->setParameter("testName", "%{$testName}%");
            $query->setParameter("typeTest", (int)$typeTest);
            //dump(1);
            $flag = true;
        }
        if (!empty($organization) && $organization != '-1') {
            $dql .= "and t.organization = :organization";
            //dump($dql);
            $query = $this->getDoctrine()->getManager()->createQuery($dql);
            $query->setParameter("testName", "%{$testName}%");
            if ($flag) {
                $query->setParameter("typeTest", (int)$typeTest);
            }

            $query->setParameter("organization", (int)$organization);
            //dump(2);
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 7);
        dump($pagination);
        $organizations = $this->getDoctrine()->getManager()->createQuery("select ds from AppBundle:DictionaryStructure ds where ds.nparentkey = 310")->getResult();
        $typesTests = $this->getDoctrine()->getManager()->createQuery("select ds from AppBundle:DictionaryStructure ds where ds.nparentkey = 2499")->getResult();

        //dump($this->getUser());
        return $this->render("home/index.html.twig",
            array('organizationId' => $organization, 'typeTest' => $typeTest, 'testName' => $testName, 'pagination' => $pagination, 'organizations' => $organizations, 'user' => $this->getUser(), 'typesTests' => $typesTests));
    }

    /**
     * @Route(path = "/home/org", name = "org")
     * @Security("is_granted('ROLE_ADMIN')")
     * @param Request $request
     * @param EntityManager $em
     * @return JsonResponse
     */
    public function organizationAction(Request $request, EntityManagerInterface $em) {
        if (!$request->isXmlHttpRequest() && $request->isMethod("post")) {
            throw new Exception("no ajax and no post");
        }
        $idTest = $request->request->get("idTest");
        $idOrg = $request->request->get("idOrg");

        $test = $em->find(Tests::class, (int) $idTest);
        $org = $em->find(DictionaryStructure::class, (int) $idOrg);

        if (!$test && !$org) {
            throw new Exception("not found data");
        }

        try {
            $em->getConnection()->beginTransaction();
            $query = $em->createQuery("update AppBundle:Tests t set t.organization = :idOrg where t.nkey = :idTest");
            $query->setParameter("idOrg", $org->getNelementkey());
            $query->setParameter("idTest", $test->getNkey());
            $query->execute();
            $em->getConnection()->commit();
        } catch (Exception $ex) {
            $em->getConnection()->rollBack();
        }
        return new JsonResponse($idTest);


    }

    /**
     * @Route(path="/home/{id}/delete", name="test_delete")
     * @param Request $request
     * @param EntityManager $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, $id) {
        $test = $this->getDoctrine()->getRepository(Tests::class)->find((int)$id);
        if (!$test) {
            throw $this->createNotFoundException("no found user");
        }

        try {
            $em->getConnection()->beginTransaction();
            $em->remove($test);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exception $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("home");
    }

    /**
     * @Route(path = "/admin/createIndex", name = "admin.createIndex")
     * @param Request $request
     * @param EntityManager $em
     */
    public function createIndex(Request $request, EntityManagerInterface $em) {
        if (!$request->isMethod("post")) {
            throw new Exception("no post");
        }
        $testName = $request->request->get("testName");
        $testDesc = $request->request->get("testDesc");
        $testType = $request->request->get("testType");

        try {
            $em->getConnection()->beginTransaction();
            $test = new Tests();
            $test->setCtestname($testName);
            $test->setCmessage($testDesc);

            if (!empty($testType) && ($testType == '2500' || $testType == '2501')) {
                $type = $em->find(DictionaryStructure::class, (int) $testType);
                if ($type) {
                    $test->setTypeTest($type);
                }
            }

            $em->persist($test);
            $em->flush($test);
            $em->getConnection()->commit();
        } catch (Exception $ex) {
            $em->getConnection()->rollBack();
        }

        return $this->redirectToRoute("admin.editAction", array('id' => $test->getNkey()));
    }


    /**
     * @Route(path = "/admin/export/tests", name = "admin.exports.tests")
     */
    public function exportTests(Request $request, EntityManagerInterface $em) {
        $tests = $em->createQuery("select t from AppBundle:Tests t")->getArrayResult();
        $res = new Response();
        $res->setContent(json_encode($tests));
        $res->headers->set('Content-type', 'application/octet-stream');
        $res->headers->set('Content-Disposition', 'attachment;filename=dump_tests.json');

        return $res;
    }
    /**
     * @Route(path = "/admin/{id}/export/", name = "test_export")
     */
    public function exportAction($id) {
        $em = $this->getDoctrine()->getManager();
        $test_by_id = $em->getRepository(Tests::class)->find((int) $id);
        $test_questions_by_id = $em->getRepository(TestsQuestions::class)->findBy(['ntestnumber' => $id]);
        $writer = $this->container->get('egyg33k.csv.writer');
        $csv = $writer::createFromFileObject(new \SplTempFileObject());
        // шапка таблицы tests
        $csv->insertOne([
            'nnumb',
            'ctestname',
            'ntesttype',
            'nstaffkey',
            'ndolzhnoctbkey',
            'nmax1',
            'nmin1',
            'nmax2',
            'nmin2',
            'nmax3',
            'nmin3',
            'nmax4',
            'nmin4',
            'nmax5',
            'nmin5',
            'cvalue1',
            'cvalue2',
            'cvalue3',
            'cvalue4',
            'cvalue5',
            'nrandom',
            'cmessage',
            'ncountion',
            'bporadok',
            'nporadokvoprosov',
            'nshowtime',
            'nlimittime',
        ]);

        // данные таблицы tests
        $csv->insertOne([
            $test_by_id->getNnumb(),
            $test_by_id->getCtestname(),
            $test_by_id->getNtesttype(),
            $test_by_id->getNstaffkey(),
            $test_by_id->getNdolzhnoctbkey(),
            $test_by_id->getNmax1(),
            $test_by_id->getNmin1(),
            $test_by_id->getNmax2(),
            $test_by_id->getNmin2(),
            $test_by_id->getNmax3(),
            $test_by_id->getNmin3(),
            $test_by_id->getNmax4(),
            $test_by_id->getNmin4(),
            $test_by_id->getNmax5(),
            $test_by_id->getNmin5(),
            $test_by_id->getCvalue1(),
            $test_by_id->getCvalue2(),
            $test_by_id->getCvalue3(),
            $test_by_id->getCvalue4(),
            $test_by_id->getCvalue5(),
            $test_by_id->getNrandom(),
            $test_by_id->getCmessage(),
            $test_by_id->getNcountion(),
            $test_by_id->isBporadok(),
            $test_by_id->getNporadokvoprosov(),
            $test_by_id->getNshowtime(),
            $test_by_id->getNlimittime(),
        ]);
        // шапка таблицы tests_questions
        $csv->insertOne([
            'ntestnumber',
            'cquestion',
            'nanswernum',
            'nuse',
            'nrandom',
            'nscale',
            'cpathpictire',
            'cmassage',
            'nperec',
            'bdostup',
            'cperecnumber',
            'canswer1',
            'canswer2',
            'canswer3',
            'canswer4',
            'canswer5',
            'canswer6',
            'canswer7',
            'canswer8',
            'canswer9',
            'canswer10',
            'nw1',
            'nw2',
            'nw3',
            'nw4',
            'nw5',
            'nw6',
            'nw7',
            'nw8',
            'nw9',
            'nw10',

        ]);


        // данные таблицы tests_questions
        foreach ($test_questions_by_id as $question){
            $csv->insertOne([
            $question->getNtestnumber(),
            $question->getCquestion(),
            $question->getNanswernum(),
            $question->getNuse(),
            $question->getNrandom(),
            $question->getNscale(),
            $question->getCpathpicture(),
            $question->getCmessage(),
            $question->getNperec(),
            $question->isBdostup(),
            $question->getCperecnumber(),
            $question->getCanswer1(),
            $question->getCanswer2(),
            $question->getCanswer3(),
            $question->getCanswer4(),
            $question->getCanswer5(),
            $question->getCanswer6(),
            $question->getCanswer7(),
            $question->getCanswer8(),
            $question->getCanswer9(),
            $question->getCanswer10(),
            $question->getNw1(),
            $question->getNw2(),
            $question->getNw3(),
            $question->getNw4(),
            $question->getNw5(),
            $question->getNw6(),
            $question->getNw7(),
            $question->getNw8(),
            $question->getNw9(),
            $question->getNw10(),
            ]);
        }

        $csv->output('test_id_'. $test_by_id->getNkey() .'.csv');
        exit;
    }
    /**
     * @Route(path = "/admin/import/", name = "tests_import")
     */
    public function importAction($id)
    {

    }
}