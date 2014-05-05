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
	    $request = $this->container->get('request');

	    
	    $em = $this->container->get('doctrine')->getEntityManager();

	    $search = "";
	    $search = $request->request->get('search');
	    $mark = intval($request->request->get('mark'));
	    $tags = json_decode($request->request->get('tagsQueried'), true);
	    $platforms = json_decode($request->request->get('platformsQueried'), true);

        $tagsQuery = "";
        if ($tags['nbtags'] != 0) {
	       	for ($i=0; $i < $tags['nbtags']; $i++) { 
	       		if ($i == 0) {
					$tagsQuery = $tagsQuery . " AND (tag.id = " . $tags['tag' . $i];
				}else{
					$tagsQuery = $tagsQuery . " OR tag.id = " . $tags['tag' . $i];
				}
	       	}
	        	
	       	$tagsQuery = $tagsQuery . ")";
	    }

	    $platformsQuery = "";
	    if ($platforms['nbplatforms'] != 0) {
	      	for ($i=0; $i < $platforms['nbplatforms']; $i++) { 
	       		if ($i == 0) {
					$platformsQuery = $platformsQuery . " AND (appinfos.platform = " . $platforms['platform' . $i];
				}else{
					$platformsQuery = $platformsQuery . " OR appinfos.platform = " . $platforms['platform' . $i];
				}
	       	}
	       	
	       	$platformsQuery = $platformsQuery . ")";
	    }

	    $searchQuery = "";
	    if ($search != ""){
	       	$searchQuery = " AND (app.name LIKE '%" . $search . "%')";
	    }
	        
	    $secndquery = 'SELECT app FROM G2sAppBundle:App app
			              JOIN app.appInfos appinfos
			              JOIN app.tags tag
			              WHERE appinfos.average_mark >= :mark' . $tagsQuery . $platformsQuery . $searchQuery;
        
        $query = $em
		          ->createQuery(
		              $secndquery
		          )->setParameter('mark', $mark);

        $apps = $query->getResult();


	        
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
}

