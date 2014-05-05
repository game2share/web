<?php

namespace G2s\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use G2s\AppBundle\Entity\App;
use G2s\AppBundle\Entity\Mark;
use G2s\AppBundle\Entity\Comment;
use G2s\AppBundle\Entity\Platform;
use G2s\AppBundle\Entity\AppInfo;

class CommentsController extends Controller
{
	public function addAction()
	{
		$request = $this->container->get('request');

	    $em = $this->container->get('doctrine')->getEntityManager();
		
		$mark = $request->request->get('mark');
		$title = $request->request->get('title');
		$commentText = $request->request->get('comment');
		$platform = $request->request->get('platform');
		$app = $request->request->get('app');

		$comment = new Comment();

		$appInfo = $em->getRepository('G2sAppBundle:AppInfo')->findBy(array('app' => intval($app), 'platform' => intval($platform)));

		$comment->setAppInfo($appInfo[0]);
		$comment->setTitle($title);
		$comment->setComment($commentText);

		if(isset($mark)){
			$newMark = new Mark();
			$newMark->setAppInfo($appInfo[0]);
			$newMark->setMark($mark);

			$em->persist($newMark);
			$em->flush();

			$comment->setMark($newMark);
		}

		$em->persist($comment);
		$em->flush();
		return new JsonResponse(array('message' => 'Your comment was successfully added !'));
	}
}

