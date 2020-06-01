<?php


namespace AppBundle\Controller;


use AppBundle\Entity\Courses;
use AppBundle\Entity\DictionaryStructure;
use AppBundle\Entity\Users;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class CoursesController extends Controller
{

    /**
     * @Route(path="/courses", name = "courses")
     */
    public function resultAction(Request $request, EntityManagerInterface $entityManager) {
        $organizations = $entityManager->createQuery("select ds from AppBundle:DictionaryStructure ds where ds.nparentkey = 310")->getResult();

        return $this->render(":courses:index.html.twig", array('organizations' => $organizations));
    }

    /**
     * @Route(path="/courses/save", name="courses_save")
     */
    public function saveAction(Request $request, EntityManagerInterface $em) {
        if (!$request->isMethod("post")) {
            return new Response("error");
        }

        $id = $request->request->get("id");
        $courseName = $request->request->get("courseName");
        $descCourse = $request->request->get("descCourse");
        $uchebOrg = $request->request->get("uchebOrg");


        try {
            $em->getConnection()->beginTransaction();
            $course = new Courses();
            if ($id != 0) {
                $course = $this->getDoctrine()->getRepository(Courses::class)->find((int)$id);
                if (!$course) {
                    throw $this->createNotFoundException("no found course");
                }
            }

            $course->setName($courseName);
            $course->setDescription($descCourse);

            if ($uchebOrg) {
                $o = $this->getDoctrine()->getManager()->createQuery(
                    "select ds from AppBundle:DictionaryStructure ds where ds.nparentkey = 310 and ds.nelementkey = :key")
                    ->setParameter("key", (int)$uchebOrg)->getSingleResult();
                if ($o) {
                    $course->setOrganization($o);
                }
            }
            $em->persist($course);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("courses");

    }

    /**
     * @Route(path="/courses/{id}/delete", name="course_delete")
     * @param Request $request
     * @param EntityManager $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, $id) {
        if (!$request->isMethod("post") || $id == 0) {
            return new Response("error");
        }

        $course = $this->getDoctrine()->getRepository(Courses::class)->find((int)$id);
        if (!$course) {
            throw $this->createNotFoundException("no found course");
        }

        try {
            $em->getConnection()->beginTransaction();
            $em->remove($course);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("courses");
    }

}