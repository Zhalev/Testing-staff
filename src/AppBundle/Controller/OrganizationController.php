<?php


namespace AppBundle\Controller;


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
class OrganizationController extends Controller
{

    /**
     * @Route(path="/organization", name = "organization")
     */
    public function resultAction(Request $request, EntityManagerInterface $entityManager) {
        $orgName = $request->query->get("orgName");
        $typeOrg = $request->query->get("typeOrg");

        $dql = "select ds from AppBundle:DictionaryStructure ds where (ds.nparentkey = 310 or ds.nparentkey = 300) and ds.celementname LIKE :orgName";
        $query = $entityManager->createQuery($dql);
        $query->setParameter("orgName", "%{$orgName}%");

        if (!empty($typeOrg) && ($typeOrg == '300' || $typeOrg == '310')) {
            $dql .= " and ds.nparentkey = :typeOrg";
            $query = $entityManager->createQuery($dql)
                ->setParameter("orgName", "%$orgName%")
                ->setParameter("typeOrg", $typeOrg);
        }

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 6);
        return $this->render(
            "organizations/index.html.twig",
            array(
                'uiTypes' => array('-1' => 'Все организации', '310' => 'Учебные', '300' => 'ЯО'),
                'orgName' => $orgName,
                'typeOrg' => $typeOrg,
                'pagination' => $pagination)
                );
    }

    /**
     * @Route(path="/organization/save", name="organization_save")
     */
    public function saveAction(Request $request, EntityManagerInterface $em) {
        if (!$request->isMethod("post")) {
            return new Response("error");
        }
        $id = $request->request->get("id");
        $orgName = $request->request->get("orgName");
        $typeOrg = $request->request->get("typeOrg");


        try {
            $em->getConnection()->beginTransaction();
            $org = new DictionaryStructure();
            if ($id != 0) {
                $org = $this->getDoctrine()->getRepository(DictionaryStructure::class)->find((int)$id);
                if (!$org) {
                    throw $this->createNotFoundException("no found user");
                }
            }
            $org->setCelementname($orgName);
            if (!empty($typeOrg) && $typeOrg == '310' || $typeOrg == '300') {
                $org->setNparentkey((int) $typeOrg);
            } else {
                throw $this->createNotFoundException("you need select type org");
            }
            $em->persist($org);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("organization");

    }

    /**
     * @Route(path="/organization/{id}/delete", name="organization_delete")
     * @param Request $request
     * @param EntityManager $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, $id) {
        if (!$request->isMethod("post") || $id == 0) {
            return new Response("error");
        }

        $org = $this->getDoctrine()->getRepository(DictionaryStructure::class)->find((int)$id);
        if (!$org) {
            throw $this->createNotFoundException("no found user");
        }

        try {
            $em->getConnection()->beginTransaction();
            $em->remove($org);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("organization");
    }

}