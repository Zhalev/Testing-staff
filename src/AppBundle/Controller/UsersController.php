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
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Security("is_granted('ROLE_ADMIN')")
 */
class UsersController extends Controller
{

    /**
     * @Route(path="/users", name = "users")
     */
    public function resultAction(Request $request, EntityManagerInterface $entityManager) {
        $lastname = $request->query->get("lastname");
        $firstName = $request->query->get("firstname");
        $middleNames = $request->query->get("middlenames");
        $login = $request->query->get("login");
        $orgName = $request->query->get("orgName");
        $keyUser = $request->query->get("keyUser");

        $flag = false;

        $dql = "select u from AppBundle:Users u where 
        u.cuserfamilyname LIKE :lastname 
        and u.cuserfirstname LIKE :firstName
        and u.cusersurname LIKE :middleNames 
        and u.cidentificator LIKE :login";

        $typesAccountDql = "select ds from AppBundle:DictionaryStructure ds where ds.nelementkey = 533 or ds.nelementkey = 532 or ds.nelementkey = 531";
        $typesAccountQuery = $entityManager->createQuery($typesAccountDql)->setMaxResults(3);
        $query = $entityManager->createQuery($dql);

        if (!empty($orgName) && $orgName != '-1') {
            $dql .= " and u.norganizationkey = :orgName";
            $query = $entityManager->createQuery($dql);
            $query->setParameter("orgName", $orgName);
            $flag = true;
        }
        if (!empty($keyUser) && $keyUser != '-1') {
            $dql .= " and u.nuserkey = :keyUser";
            $query = $entityManager->createQuery($dql);
            $query->setParameter("keyUser", (int) $keyUser);

            if ($flag) {
                $query->setParameter("orgName", $orgName);
            }
        }

        $query->setParameter("lastname", "%{$lastname}%");
        $query->setParameter("firstName", "%{$firstName}%");
        $query->setParameter("middleNames", "%{$middleNames}%");
        $query->setParameter("login", "%{$login}%");

        $org = $entityManager->createQuery("select ds from AppBundle:DictionaryStructure ds where ds.nparentkey = 300 or ds.nparentkey = 310")->getResult();
        $users = $entityManager->createQuery("select u from AppBundle:Users u")->getResult();
        $typesAccount = $typesAccountQuery->getResult();

        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate($query, $request->query->getInt('page', 1), 6);
        return $this->render(
            "user/index.html.twig",
            array(
                'typesAccount' => $typesAccount,
                'pagination' => $pagination,
                'orgs' => $org,
                'users' => $users,
                'firstName' => $firstName,
                'lastName' => $lastname,
                'middleNames' => $middleNames,
                'login' => $login,
                'oldOrgName' => $orgName,
                'oldUserKey' =>$keyUser
            )
        );
    }

    /**
     * @Route(path="/users/save", name="user_save")
     */
    public function saveAction(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder) {
        if (!$request->isMethod("post")) {
            return new Response("error");
        }

        $id = $request->request->get("id");
        $login = $request->request->get("login");
        $password = $request->request->get("password");
        $firstName = $request->request->get("firstName");
        $lastName = $request->request->get("lastName");
        $middleNames = $request->request->get("middleNames");
        $org = $request->request->get("org");
        $typeAccount = (int) $request->request->get("typeAccount");

        try {
            $em->getConnection()->beginTransaction();
            $user = new Users();
            if ($id != 0) {
                $user = $this->getDoctrine()->getRepository(Users::class)->find((int)$id);
                if (!$user) {
                    throw $this->createNotFoundException("no found user");
                }
            }

            $user->setCidentificator($login);
            $user->setCuserfirstname($firstName);
            $user->setCpassword($encoder->encodePassword($user, $password));
            $user->setCuserfamilyname($lastName);
            $user->setCusersurname($middleNames);

            if ($typeAccount == 533 || $typeAccount == 532 || $typeAccount == 531) {
                $user->setNusertypekey($typeAccount);
            } else {
                $typeKey = $user->getNusertypekey();
                if (!$typeKey) {
                    $user->setNusertypekey(532);
                } else {
                    $user->setNusertypekey($typeKey);
                }
            }

            if ($org) {
                $o = $this->getDoctrine()->getManager()->createQuery("select ds from AppBundle:DictionaryStructure ds where (ds.nparentkey = 300 or ds.nparentkey = 310) and ds.nelementkey = :key")
                    ->setParameter("key", $org)->getSingleResult();
                if ($o) {
                    $user->setOrganization($o);
                }
            }
            $em->persist($user);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("users");

    }

    /**
     * @Route(path="/users/{id}/delete", name="user_delete")
     * @param Request $request
     * @param EntityManager $em
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     * @throws \Exception
     */
    public function deleteAction(Request $request, EntityManagerInterface $em, $id) {
        if (!$request->isMethod("post") || $id == 0) {
            return new Response("error");
        }

        $user = $this->getDoctrine()->getRepository(Users::class)->find((int)$id);
        if (!$user) {
            throw $this->createNotFoundException("no found user");
        }

        try {
            $em->getConnection()->beginTransaction();
           $em->remove($user);
            $em->flush();

            $em->getConnection()->commit();
        } catch (Exceptione $ex) {
            $em->rollback();
            throw $ex;
        }

        return $this->redirectToRoute("users");
    }
}