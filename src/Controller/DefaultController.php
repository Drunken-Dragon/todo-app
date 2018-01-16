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
        return $this->render('base.html.twig');
    }

    /**
     * @Route("/admin")
     */

    public function admin()
    {
        return $this->render('base.html.twig');
    }
}
