<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    public function indexAction()
    {
        return $this->render('G2sAppBundle:Home:index.html.twig');
    }

	public function appsAction()
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:Apps');
		$queriedApps	= $repository->findAll();

		$apps			= array();

		foreach($queriedApps as $queriedApp)
		{
			$app				= array();
			$globalAvgMark		= 0;

			$app['app']			= $queriedApp;

			$appInfo			= array();

			foreach($queriedApp->getAppInfos() as $queriedAppInfo)
			{
				$avgMark	= 0;

				foreach($queriedAppInfo->getMarks() as $mark)
					$avgMark += $mark->getMark();
				if(count($queriedAppInfo->getMarks()) != 0)
					$avgMark /= count($queriedAppInfo->getMarks());

				$appInfos[] = array(
					'platform'	=> $queriedAppInfo->getPlatform(),
					'comments'	=> $queriedAppInfo->getComments(),
					'marks'		=> $queriedAppInfo->getMarks(),
					'avgMark'	=> $avgMark
				);

				$globalAvgMark += $avgMark;
			}

			$app['appInfos']	= $appInfos;

			$globalAvgMark /= count($appInfos);
			$app['avgMark']		= $globalAvgMark;

			$apps[]				= $app;
		}

		return $this->render(
			'G2sAppBundle:Apps:list.html.twig',
			array('apps' => $apps)
		);
	}
}
