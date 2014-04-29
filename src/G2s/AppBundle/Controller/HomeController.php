<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use G2s\AppBundle\Entity\App;
use G2s\AppBundle\Entity\Platform;
use G2s\AppBundle\Entity\AppInfo;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('G2sAppBundle:Home:index.html.twig');
    }

	public function aboutAction()
	{
        return $this->render('G2sAppBundle:Home:about.html.twig');
	}

	public function contactAction()
	{
        return $this->render('G2sAppBundle:Home:contact.html.twig');
	}

}
