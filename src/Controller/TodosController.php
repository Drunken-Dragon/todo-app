<?php

namespace App\Controller;

use App\Entity\Todo;
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
        $todos = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->findAll();
        return $this->render('todos/list.html.twig', [
            'todos' => $todos
        ]);
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
