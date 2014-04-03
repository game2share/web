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

	public function appsAction()
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:App');
		$queriedApps	= $repository->findAll();

		$apps			= array();

		$i = 0;

		foreach($queriedApps as $queriedApp)
		{
			$app				= array();
			$globalAvgMark		= 0;

			$app['app']			= $queriedApp;

			$appInfos			= array();

			$j = 0;

			if(!is_null($queriedApp->getAppInfos()))
			{
				foreach($queriedApp->getAppInfos() as $queriedAppInfo)
				{
					$avgMark	= 0;

					foreach($queriedAppInfo->getMarks() as $mark)
						$avgMark += $mark->getMark();
					if(count($queriedAppInfo->getMarks()) != 0)
						$avgMark /= count($queriedAppInfo->getMarks());

					$appInfos[$j] = array(
						'platform'	=> $queriedAppInfo->getPlatform(),
						'dlPath'	=> $queriedAppInfo->getDownloadPath(),
						'comments'	=> $queriedAppInfo->getComments(),
						'marks'		=> $queriedAppInfo->getMarks(),
						'avgMark'	=> $avgMark
					);

					$globalAvgMark += $avgMark;
				}
			}

			$app['appInfos']	= $appInfos;
			if(count($appInfos))
				$globalAvgMark /= count($appInfos);
			$app['avgMark']		= $globalAvgMark;

			$apps[$i]				= $app;
			$i++;
		}

		return $this->render(
			'G2sAppBundle:Apps:list.html.twig',
			array('apps' => $apps)
		);
	}
}
