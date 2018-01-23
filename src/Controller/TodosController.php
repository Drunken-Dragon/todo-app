<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TodosController extends AbstractController
{
    /**
     * @Route("/todos")
     */
    public function todosList()
    {
        $data = $this->getDB()->fetchAll('SELECT * FROM todos');
        var_dump($data);die();
        return $this->render('todos/list.html.twig');
    }
    /**
     * @Route("/todos/new")
     */
    public function todosNew(Request $request)
    {
        return $this->render('todos/new.html.twig');
    }
    /**
     * @Route("/todos/edit/{id}")
     */
    public function todosEdit($id, Request $request)
    {
        return $this->render('todos/edit.html.twig');
    }
    /**
     * @Route("/todos/details/{id}")
     */
    public function todosDetails($id)
    {
        return $this->render('todos/details.html.twig');
    }
}
