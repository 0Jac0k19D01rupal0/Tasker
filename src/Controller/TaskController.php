<?php


namespace App\Controller;


use App\Entity\Task;
use App\Form\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends AbstractController
{
        public function index(Request $request)
        {
            $task = new Task();
            $form = $this->createForm(TaskType::class, $task);
            $form->handleRequest($request);
            $date = $form->getData();

            return $this->render('task.html.twig',
            [   'form' => $form->createView(),
                'task' => $task
            ]
            );


        }

}