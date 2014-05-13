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
		$app			= null;

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

	public function showSelectedAction()
	{
		$tagRepository		= $this->getDoctrine()->getRepository('G2sAppBundle:Tag');
		$platformRepository = $this->getDoctrine()->getRepository('G2sAppBundle:Platform');
		$tags 			= $tagRepository->findAll();
		$platforms      = $platformRepository->findAll();
		if($tags == null)
			throw $this->createNotFoundException('Apps not found');

		return $this->render(
			'G2sAppBundle:Apps:show-selected.html.twig',
			array('tags' => $tags, 'platforms' => $platforms)
		);
	}

	public function selectAppsAction()
	{
	    $request	= $this->container->get('request');

	    $search		= "";
	    $search		= $request->request->get('search');
	    $mark		= intval($request->request->get('mark'));
	    $tags		= json_decode($request->request->get('tagsQueried'), true);
	    $platforms	= json_decode($request->request->get('platformsQueried'), true);

		$apps		= $this->searchApps($search, $mark, $tags, $platforms);

	    if($request->isXmlHttpRequest())
	    {
			return $this->container->get('templating')->renderResponse('G2sAppBundle:Apps:show-all-nolayout.html.twig', array(
	            'apps' => $apps,
	            ));
	    }else{

			return $this->container->get('templating')->renderResponse('G2sAppBundle:Apps:show-all.html.twig', array(
	            'apps' => $apps,
	            ));
	    }
	}

	/**
	 * Search apps
	 * \param $search		string to find in app name
	 * \param $mark			minimal mark
	 * \param $tags			array of tags id
	 * \param $platforms	array of platforms id
	 */
	public function searchApps($search, $mark, $tags, $platforms)
	{
	    $em			= $this->container->get('doctrine')->getManager();

		$markQuery = "";
		if ($mark != null && $mark != 0) {
			$markQuery = " AND appinfos.average_mark >= :mark";
		}

        $tagsQuery	= "";
        if ($tags != null && count($tags) != 0) {

			$isFirst = true;

			$tagsQuery .= " AND tag.id in ( ";

			foreach ($tags as $tag) {
				if($isFirst) {
					$isFirst = false;
				} else {
					$tagsQuery .= " , ";
				}

				$tagsQuery .= $tag;
	       	}

			$tagsQuery .= " )";
	    }

        $platformsQuery	= "";
        if ($platforms != null && count($platforms) != 0) {

			$isFirst = true;

			$platformsQuery .= " AND appinfos.platform in ( ";

			foreach ($platforms as $platform) {
				if($isFirst) {
					$isFirst = false;
				} else {
					$platformsQuery .= " , ";
				}

				$platformsQuery .= $platform;
	       	}

			$platformsQuery .= " )";
	    }

	    $searchQuery = "";
	    if ($search != null && $search != ""){
	       	$searchQuery = " AND (app.name LIKE '%" . $search . "%')";
	    }
	        
	    $secndquery = 'SELECT app FROM G2sAppBundle:App app
			              JOIN app.appInfos appinfos
						  JOIN app.tags tag
						  WHERE true = true' . $markQuery . $tagsQuery . $platformsQuery . $searchQuery;
        
		$query = $em->createQuery($secndquery);
		if($markQuery != "") {
			$query->setParameter('mark', $mark);
		}

        return $query->getResult();
	}
}

