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
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:App');

		$apps			= $repository->findAll();

		if($apps == null)
			throw $this->createNotFoundException('Apps not found');

		return $this->render(
			'G2sAppBundle:Home:index.html.twig',
			array('apps' => $apps)
		);
    }

	public function aboutAction()
	{
		return $this->render(
			'G2sAppBundle:Home:about.html.twig', 
			array('short' => false)
			);
	}

	public function contactAction()
	{
        return $this->render('G2sAppBundle:Home:contact.html.twig');
	}

}
