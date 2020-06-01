<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Tests;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Query\ResultSetMapping;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class ResultController extends Controller
{

    /**
     * @Route(path="/result/questions", name = "result")
     */
    public function resultAction(Request $request, EntityManagerInterface $entityManager) {
        $nameQuestion = $request->query->get("nameQuestion");
        $testName = $request->query->get("testName");
        $lastName = $request->query->get("lastName");
        $dateStart = $request->query->get("dateStart");
        $dateEnd = $request->query->get("dateEnd");

        $dql = "select
                ta.nkey,
                q.cquestion as question,
                concat(u.cuserfirstname, ' ', u.cuserfamilyname, ' ', u.cusersurname) as fio,
                t.ctestname as testName,
                ta.testDate,
                q.nw1, q.nw2, q.nw3, q.nw4, q.nw5, q.nw6, q.nw7, q.nw8, q.nw9, q.nw10,
                ta.ans1, ta.ans2, ta.ans3, ta.ans4, ta.ans5, ta.ans6, ta.ans7, ta.ans8, ta.ans9, ta.ans10
                from AppBundle:TestsAnswers ta
                    inner join AppBundle:TestsQuestions q with q.nkey = ta.question
                    inner join AppBundle:Users u with u.nuserkey = ta.nstaffkey
                    inner join AppBundle:Tests t with t.nkey = q.ntestnumber
                    WHERE u.cuserfamilyname LIKE :lastName and t.ctestname LIKE :testName and q.cquestion LIKE :nameQuestion 
                ";

        $flag = false;
        if (!empty($dateStart) && !empty($dateEnd)) {
            $dql .= " and ta.testDate >= :dateStart and ta.testDate <= :dateEnd";
            $flag = true;
        }
        $dql .= " order by ta.nkey desc";

        $query = $entityManager->createQuery($dql);
        $query->setParameter("nameQuestion", "%{$nameQuestion}%");
        $query->setParameter("testName", "%{$testName}%");
        $query->setParameter("lastName", "%{$lastName}%");

        if ($flag) {
            //dump($dateStart);
            //dump($dateEnd);
            $query->setParameter(":dateStart", $dateStart);
            $query->setParameter(":dateEnd", $dateEnd);

            //dump($dql);
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 10);
        return $this->render("result/index.html.twig", array('pagination' => $pagination, 'lastName' => $lastName, 'testName' => $testName, 'nameQuestion' => $nameQuestion));
    }


    /**
     * @Route(path="/result/tests", name = "resultTests")
     */
    public function resultTesting(Request $request, EntityManagerInterface $entityManager) {
        $testName = $request->query->get("testName");
        $lastName = $request->query->get("lastName");
        $dateStart = $request->query->get("dateStart");
        $dateEnd = $request->query->get("dateEnd");

       $queryBuilder = $entityManager->createQueryBuilder()
           ->select("min(t.ctestname) as testName,
            concat(min(u.cuserfamilyname), ' ', min(u.cuserfirstname), ' ', min(u.cusersurname)) as fio,
            min(ta.testDate) as dateStart,
            max(ta.testDate) as dateEnd,
            sum(COALESCE(ta.ans1, 0)) + sum(COALESCE(ta.ans2, 0)) + sum(COALESCE(ta.ans3, 0)) + sum(COALESCE(ta.ans4, 0)) + sum(COALESCE(ta.ans5, 0)) + sum(COALESCE(ta.ans6, 0)) + sum(COALESCE(ta.ans7, 0)) + sum(COALESCE(ta.ans8, 0)) + sum(COALESCE(ta.ans9, 0)) + sum(COALESCE(ta.ans10, 0)) as pollBalls,
            sum(COALESCE(q.nw1, 0)) + sum(COALESCE(q.nw2, 0)) + sum(COALESCE(q.nw3, 0)) + sum(COALESCE(q.nw4, 0)) + sum(COALESCE(q.nw5, 0)) + sum(COALESCE(q.nw6, 0)) + sum(COALESCE(q.nw7, 0)) + sum(COALESCE(q.nw8, 0)) + sum(COALESCE(q.nw9, 0)) + sum(COALESCE(q.nw10, 0)) as maxBalls,
            ta.ntestnumber as testKey,
            ta.testId
            ")
           ->from("AppBundle:TestsAnswers", "ta")
           ->where("ta.testDate is not null and t.ctestname LIKE :testName and u.cuserfamilyname LIKE :lastName")
           ->innerJoin("AppBundle:Tests", "t", "with", "t.nkey = ta.ntestnumber")
           ->innerJoin("AppBundle:Users", "u", "with", "u.nuserkey = ta.nstaffkey")
           ->innerJoin("AppBundle:TestsQuestions", "q", "with", "q.nkey = ta.question")
           ->groupBy("ta.testId")
           ->addGroupBy("ta.ntestnumber")
           ->orderBy("dateEnd", "desc");

        $queryBuilder->setParameter("testName", "%{$testName}%");
        $queryBuilder->setParameter("lastName", "%{$lastName}%");

        $flag = false;
        if (!empty($dateStart) && !empty($dateEnd)) {
            $queryBuilder->andWhere("ta.testDate >= :dateStart and ta.testDate <= :dateEnd");
            $queryBuilder->setParameter("dateStart", $dateStart);
            $queryBuilder->setParameter("dateEnd", $dateEnd);
            $flag = true;
        }

        $query = $queryBuilder->getQuery();
        $countsElemenets = count($queryBuilder->getQuery()->getResult());
        $query->setHint("knp_paginator.count", $countsElemenets);

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 10, array('distinct' => false));

        return $this->render(
            "result/result_testing.html.twig",
            array(
                'pagination' => $pagination,
                'lastName' => $lastName,
                'testName' => $testName));

    }

    /**
     * @Route(path="/result/tests/{testId}/report", name = "generateReport")
     */
    public function generateReport($testId , EntityManagerInterface $entityManager) {
        $queryBuilder = $entityManager->createQueryBuilder()
            ->select("min(t.ctestname) as testName,
            concat(min(u.cuserfamilyname), ' ', min(u.cuserfirstname), ' ', min(u.cusersurname)) as fio,
            min(ta.testDate) as dateStart,
            max(ta.testDate) as dateEnd,
            sum(COALESCE(ta.ans1, 0)) + sum(COALESCE(ta.ans2, 0)) + sum(COALESCE(ta.ans3, 0)) + sum(COALESCE(ta.ans4, 0)) + sum(COALESCE(ta.ans5, 0)) + sum(COALESCE(ta.ans6, 0)) + sum(COALESCE(ta.ans7, 0)) + sum(COALESCE(ta.ans8, 0)) + sum(COALESCE(ta.ans9, 0)) + sum(COALESCE(ta.ans10, 0)) as pollBalls,
            sum(COALESCE(q.nw1, 0)) + sum(COALESCE(q.nw2, 0)) + sum(COALESCE(q.nw3, 0)) + sum(COALESCE(q.nw4, 0)) + sum(COALESCE(q.nw5, 0)) + sum(COALESCE(q.nw6, 0)) + sum(COALESCE(q.nw7, 0)) + sum(COALESCE(q.nw8, 0)) + sum(COALESCE(q.nw9, 0)) + sum(COALESCE(q.nw10, 0)) as maxBalls,
            ta.ntestnumber as testKey,
            ta.testId
            ")
            ->from("AppBundle:TestsAnswers", "ta")
            ->where("ta.testDate is not null and ta.testId = :testId")
            ->innerJoin("AppBundle:Tests", "t", "with", "t.nkey = ta.ntestnumber")
            ->innerJoin("AppBundle:Users", "u", "with", "u.nuserkey = ta.nstaffkey")
            ->innerJoin("AppBundle:TestsQuestions", "q", "with", "q.nkey = ta.question")
            ->groupBy("ta.testId")
            ->addGroupBy("ta.ntestnumber")
            ->orderBy("dateEnd", "desc");

        $queryBuilder->setParameter("testId", $testId);

        $query = $entityManager->createQuery("
            select 
            q.cquestion as question,
            ta.testDate,
            q.nw1, q.nw2, q.nw3, q.nw4, q.nw5, q.nw6, q.nw7, q.nw8, q.nw9, q.nw10,
            ta.ans1, ta.ans2, ta.ans3, ta.ans4, ta.ans5, ta.ans6, ta.ans7, ta.ans8, ta.ans9, ta.ans10
            from AppBundle:TestsAnswers ta
            inner join AppBundle:TestsQuestions q with q.nkey = ta.question
            where ta.testId = :testId
        ");
        $query->setParameter("testId", $testId);

        return $this->render(
            "result/result_report.html.twig",
            array(

                'test' => $queryBuilder->getQuery()->getResult(),
                'questions' => $query->getResult()
            )
        );
    }
}