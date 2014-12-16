<?php
/**
 * @author: JuanLuis
 * @date: 16/12/14 18:30
 */

namespace JuanLuis\LabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TaskController extends Controller
{
    public function listAction()
    {
        $tasks = $this->getDoctrine()->getRepository('JuanLuisLabBundle:Task')->findAll();

        return $this->render('JuanLuisLabBundle:Task:list.html.twig', array(
            'tasks' => $tasks
        ));
    }
} 