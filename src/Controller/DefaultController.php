<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index()
    {
        $result = $this->getDB()->fetchAll('SELECT * FROM  users');

        return new Response(print_r($result, true));
    }
}
