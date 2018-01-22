<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller as SymfonyController;

abstract class AbstractController extends SymfonyController
{
    protected function getDB()
    {
        return $this->getDoctrine()->getConnection();
    }

    protected function getEM()
    {
        return $this->getDoctrine()->getManager();
    }
}
