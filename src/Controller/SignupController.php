<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\SignupRequest;
use App\Form\SignupType;
use Symfony\Component\HttpFoundation\Request;

class SignupController extends AbstractController
{
    public function signupAction(Request $request)
    {
        $data = new SignupRequest();
        $loginForm = $this->createForm(SignupType::class, $data);
        $loginForm->handleRequest($request);

        if ($loginForm->isSubmitted() && $loginForm->isValid()) {
            $user = new User($data->name, password_hash($data->password, PASSWORD_DEFAULT));

            var_dump($user);
            die();

//            $this->getEM()->persist($user);
//            $this->getEM()->flush();
        }
    }
}