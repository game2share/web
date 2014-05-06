<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use G2s\AppBundle\Entity\App;
use G2s\AppBundle\Entity\Platform;
use G2s\AppBundle\Entity\AppInfo;

class TagsController extends Controller
{
	public function showAction($tag_id)
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:Tag');
		$tag			= null;

		if(is_numeric($tag_id))
			$tag	= $repository->findOneById($tag_id);
		else if(is_string($tag_id))
			$tag	= $repository->findOneByName($tag_id);

		if($tag == null)
			throw $this->createNotFoundException('Tag not found');

		return $this->container->get('templating')->renderResponse('G2sAppBundle:Tags:show-all.html.twig', array(
			'tagName' => $tag->getName(),
			'apps' => $tag->getApps()
		));
	}
}

