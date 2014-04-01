<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('G2sAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
