<?php

namespace App\Controller;

use App\Form\LoginType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function login(Request $request, AuthenticationUtils $authUtils)
    {
        $form = $this->createForm(LoginType::class);

        return $this->render('login.html.twig', [
            'last_username' => $authUtils->getLastUsername(),
            'error'         => $authUtils->getLastAuthenticationError(),
            'form'          => $form->createView()
        ]);
    }
}
