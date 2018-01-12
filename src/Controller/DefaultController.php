<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function index()
    {
        $session = new Session();
        var_dump($session);
//        $result = $this->getDB()->fetchAll('SELECT * FROM  users');
//
//        return new Response(print_r($result, true));
        return $this->render('base.html.twig');
    }
}
