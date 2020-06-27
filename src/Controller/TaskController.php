<?php


namespace App\Controller;


use App\Entity\Task;
use App\Form\TaskType;
use App\Repository\TaskRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends AbstractController
{

//    /** @var TaskRepository $TaskRepository */
//    private $TaskRepository;
//
//    public function __construct(TaskRepository $TaskRepository)
//    {
//        $this->TaskRepository = $TaskRepository;
//    }

    public function index(Task $task, Request $request)
        {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($task);
            $entityManager->flush();
            return $this->redirectToRoute("app_task", [ 'id' => $task->getId()]);

        }


        public function newTask(Request $request)
        {
                $task = new Task();
                $form = $this->createForm(TaskType::class, $task);
                $form->handleRequest($request);

                if ($form->isSubmitted())
                {
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($task);
                $entityManager->flush();
                return $this->redirectToRoute("app_task", ['id' => $task->getId()]);
            }

         return $this->render('task/new_task.html.twig', [
             'form' => $form->createView(),
             'task' => $task
             ]);


        }

}