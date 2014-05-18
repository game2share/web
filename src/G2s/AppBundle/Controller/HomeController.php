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
    	$agent = $_SERVER['HTTP_USER_AGENT'];

		if(preg_match('/Linux/',$agent)) $os = 'Linux';
		elseif(preg_match('/Win/',$agent)) $os = 'Windows';
		elseif(preg_match('/Android/',$agent)) $os = 'Android';
		else $os = 'UnKnown';

		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:Platform');

		$platform = $repository->findBy(array("name" => $os));

		/*if($platform == null || $platform[0]->getAppInfos() == null){
			return $this->render(
				'G2sAppBundle:Home:index.html.twig',
				array('appInfos' => null,
					  'os' => $os)
			);
		}*/

		return $this->render(
			'G2sAppBundle:Home:index.html.twig',
			array('appInfos' => $platform[0]->getAppInfos(),
				  'os' => $os)
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
