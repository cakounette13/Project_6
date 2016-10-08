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
	 * @Route("/", name="bird")
	 * @Template("default/index.html.twig")
	 */
	public function indexAction() {
		$birds  = $this->get('search_bird')->FindBirdsEncodeJson();
		return [
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

	/**
	 * @Route("/form/ajax", name="form_ajax")
	 * @Template("default/ajax_form.html.twig")
	 * @Method("GET")
	 */
	public function jsonForm()
	{
		$form = $this->get('add_bird')->ajaxFrom();
		return ['form' => $form->createView()];
	}

	/**
	 * @Route("/nouvelle_observation", name="add_observation")
	 * @Template("default/new_observation.html.twig")
	 */
	public function addObservationAction(Request $request)
	{

		return [
		];
	}
}
