<?php

namespace BirdBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller {
	/**
	 * @Route("/", options={"expose"=true}, name="bird")
	 * @Template("default/index.html.twig")
	 */
	public function indexAction( Request $request ) {
		$search = $this->get( 'search_bird' )->createSearchField( $request );
		$birds  = $this->get( 'search_bird' )->FindBirdsEncodeJson();

		return [
			'search' => $search->createView(),
			'birds'  => $birds
		];
	}

	/**
	 * @Route("/json", name="json_birds")
	 * @Method("GET")
	 */
	public function jsonDatas()
	{
		$birds  = $this->get( 'search_bird' )->FindBirdsEncodeJson();
		return new JsonResponse($birds);
	}
}
