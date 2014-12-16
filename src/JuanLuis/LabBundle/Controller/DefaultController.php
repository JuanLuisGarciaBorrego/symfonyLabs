<?php

namespace JuanLuis\LabBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('JuanLuisLabBundle:Default:index.html.twig', array('name' => $name));
    }
}
