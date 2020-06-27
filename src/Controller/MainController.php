<?php


namespace App\Controller;


use App\Entity\Task;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    public function index(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $tasks = $em->getRepository(Task::class)->findAll();

        return $this->render('main/main.html.twig', ['tasks' => $tasks]);
    }

}

