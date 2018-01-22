<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodosController extends Controller
{
    /**
     * @Route("/todos")
     */
    public function todosList()
    {
        return $this->render('base.html.twig');
    }
}
