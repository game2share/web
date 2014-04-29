<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use G2s\AppBundle\Entity\App;
use G2s\AppBundle\Entity\Platform;
use G2s\AppBundle\Entity\AppInfo;

class AppsController extends Controller
{
    public function indexAction()
    {
        return $this->render('G2sAppBundle:Home:index.html.twig');
    }

	public function showOneAction($app_id)
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:App');
		$app;

		if(is_numeric($app_id))
			$app	= $repository->findOneById($app_id);
		else if(is_string($app_id))
			$app	= $repository->findOneByName($app_id);

		if($app == null)
			throw $this->createNotFoundException('App not found');

		return $this->render(
			'G2sAppBundle:Apps:show-one.html.twig',
			array('app' => $app)
		);
	}

	public function showAllAction()
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:App');

		$apps			= $repository->findAll();

		if($apps == null)
			throw $this->createNotFoundException('Apps not found');

		return $this->render(
			'G2sAppBundle:Apps:show-all.html.twig',
			array('apps' => $apps)
		);
	}
}

