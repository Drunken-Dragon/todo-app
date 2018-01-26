<?php

namespace App\Controller;

use App\Entity\Todo;
use App\Form\AddTodoRequest;
use App\Form\TodoType;
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
    public function todosAdd(Request $request)
    {
        $data = new AddTodoRequest();
        $form = $this->createForm(TodoType::class, $data);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $todo = Todo::create($data->todo, $data->assigned_to, $data->due_date, $data->details, $data->status);
            $this->getEM()->persist($todo);
            $this->getEM()->flush();

            $this->addFlash('notice', 'Todo created');

            return $this->redirect('/todos');
        }

        return $this->render(
            'todos/new.html.twig',
            ['form' => $form->createView()]
        );
    }
    /**
     * @Route("/todos/edit/{id}")
     */
    public function todosEdit($id, Request $request)
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->find($id);

        $form = $this->createForm(TodoType::class, $todo);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getEM()->persist($todo);
            $this->getEM()->flush();

            $this->addFlash('notice', 'Todo updated');

            return $this->redirect('/todos');
        }

        return $this->render(
            'todos/edit.html.twig',
            ['form' => $form->createView()]
        );
    }
    /**
     * @Route("/todos/details/{id}")
     */
    public function todosDetails($id)
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->find($id);

        return $this->render('todos/details.html.twig', [
            'todo' => $todo
        ]);
    }
    /**
     * @Route("/todos/delete/{id}")
     */
    public function todosDelete($id)
    {
        $todo = $this->getDoctrine()
            ->getRepository(Todo::class)
            ->find($id);

        $this->getEM()->remove($todo);
        $this->getEM()->flush();

        $this->addFlash('notice', 'Todo deleted');

        return $this->redirect('/todos');
    }
}
