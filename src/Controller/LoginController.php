<?php

namespace App\Controller;


use App\Form\LoginRequest;
use App\Form\LoginType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LoginController extends AbstractController
{
    /**
     * @Route("/login")
     */
    public function loginAction(Request $request)
    {
        $data = new LoginRequest();
        $form = $this->createForm(LoginType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $this->getDB()->fetchAll('SELECT * FROM  users WHERE name = ?', [$data->name]);

            if (password_verify($data->password, $user[0]['password'])) {
                return new Response(print_r($user, true));
            }
        }

        return $this->render(
            'login.html.twig',
            ['form' => $form->createView()]
        );
    }
}