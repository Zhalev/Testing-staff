<?php

namespace AppBundle\Controller;


use AppBundle\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller

{
    /**
     * @Route(path="/login", name="login")
     * @param Request $request
     * @param AuthenticationUtils $authUtils
     */
    public function loginAction(Request $request, AuthenticationUtils $authUtils)
    {
        $error = $authUtils->getLastAuthenticationError();
        $lastUsername = $authUtils->getLastUsername();


        return $this->render("auth/login.html.twig", array("error" => $error, "lastUserName" => $lastUsername));
    }

}