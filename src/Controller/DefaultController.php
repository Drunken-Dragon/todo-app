<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/")
     */

    public function index()
    {
        $result = $this->getDB()->fetchAll('SELECT * FROM  users');

        return new Response(print_r($result, true));
    }
}
