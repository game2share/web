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

	public function showAction($app_id)
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:App');
		$queriedApps	= array();

		if(is_numeric($app_id))
			$queriedApps[0]	= $repository->findOneById($app_id);
		else if(is_string($app_id))
			$queriedApps[0]	= $repository->findOneByName($app_id);

		if(sizeof($queriedApps) == 0 || $queriedApps[0] == null)
			throw $this->createNotFoundException('App not found');

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
			'G2sAppBundle:Apps:show.html.twig',
			array('apps' => $apps)
		);
	}
}
