<?php
/**
 * @author: JuanLuis
 * @date: 16/12/14 18:30
 */

namespace JuanLuis\LabBundle\Controller;

use JuanLuis\LabBundle\Entity\Task;
use JuanLuis\LabBundle\Form\Type\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaskController extends Controller
{
    public function listAction()
    {
        $tasks = $this->getDoctrine()->getRepository('JuanLuisLabBundle:Task')->findAll();

        return $this->render('JuanLuisLabBundle:Task:list.html.twig', array(
            'tasks' => $tasks
        ));
    }

    public function newAction(Request $request)
    {
        $task = new Task();
        $form = $this->createForm(new TaskType(), $task);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $em = $this->getDoctrine()->getManager();
            $em->persist($task);
            $em->flush();

            return $this->redirectToRoute('juan_luis_lab_task_list');
        }

        return $this->render('JuanLuisLabBundle:Task:new.html.twig', array(
            'form' => $form->createView()
        ));
    }
} 