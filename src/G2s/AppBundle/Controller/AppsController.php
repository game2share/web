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
		$queriedAppp;

		if(is_numeric($app_id))
			$queriedApp	= $repository->findOneById($app_id);
		else if(is_string($app_id))
			$queriedApp	= $repository->findOneByName($app_id);

		if($queriedApp == null)
			throw $this->createNotFoundException('App not found');

		return $this->render(
			'G2sAppBundle:Apps:show-one.html.twig',
			array('app' => $this->convertApp($queriedApp))
		);
	}

	public function showAllAction()
	{
		$repository		= $this->getDoctrine()->getRepository('G2sAppBundle:App');
		$queriedAppp;

		$queriedApps	= $repository->findAll();

		if($queriedApps == null)
			throw $this->createNotFoundException('Apps not found');

		$apps			= array();

		$i = 0;
		foreach($queriedApps as $queriedApp)
		{
			$apps[$i]	= $this->convertApp($queriedApp);
			$i++;
		}

		return $this->render(
			'G2sAppBundle:Apps:show-all.html.twig',
			array('apps' => $apps)
		);
	}

	public function convertApp($toConvertApp)
	{
		$app				= array();
		$globalAvgMark		= 0;

		$app['app']			= $toConvertApp;

		$appInfos			= array();

		$j = 0;

		if(!is_null($toConvertApp->getAppInfos()))
		{
			foreach($toConvertApp->getAppInfos() as $queriedAppInfo)
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

		return $app;
	}
}

