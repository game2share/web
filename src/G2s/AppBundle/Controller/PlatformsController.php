<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use G2s\AppBundle\Entity\App;
use G2s\AppBundle\Entity\Platform;
use G2s\AppBundle\Entity\AppInfo;

class PlatformsController extends Controller
{
	public function showAction($platform_id)
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:Platform');
		$platform		= null;

		if(is_numeric($platform_id))
			$platform	= $repository->findOneById($platform_id);
		else if(is_string($platform_id))
			$platform	= $repository->findOneByName($platform_id);

		if($platform == null)
			throw $this->createNotFoundException('Platform not found');

		return $this->container->get('templating')->renderResponse('G2sAppBundle:Platforms:show-all.html.twig', array(
			'platformName' => $platform->getName(),
			'appInfos' => $platform->getAppInfos()
		));
	}
}

