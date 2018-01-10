<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupRequest;
use App\Form\SignupType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SignupController extends AbstractController
{
    /**
     * @Route("/signup")
     */
    public function signupAction(Request $request)
    {
        $data = new SignupRequest();
        $loginForm = $this->createForm(SignupType::class, $data);
        $loginForm->handleRequest($request);

        if ($loginForm->isSubmitted() && $loginForm->isValid()) {
            $user = new User($data->name, password_hash($data->password, PASSWORD_DEFAULT));
            $this->getEM()->persist($user);
            $this->getEM()->flush();

            return new Response(print_r('User data has been saved to db', true));
        }
        return $this->render(
            'signup.html.twig',
            ['form' => $loginForm->createView()]
        );
    }
}
