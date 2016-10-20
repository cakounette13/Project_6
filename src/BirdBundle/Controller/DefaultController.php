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
	 * @Route("/nouvelle_observation", name="add_observation")
	 * @Template("default/new_observation.html.twig")
	 */
	public function addObservationAction(Request $request)
	{
		$form = $this->get('add_bird')->formBuilder($request);
		return ['form' => $form->createView()];
	}

	/**
    * @Route("/login", name="login")
     * @Template("default/connection.html.twig")
     */
	public function login()
    {
    }

    /**
     * @Route("/logout", name="logout")
     * @Template("default/deconnection.html.twig")
     */
    public function logout()
    {
    }

    /**
     * @Route("/inscription", name="inscription")
     * @Template("default/inscription.html.twig")
     */
    public function inscription()
    {
    }

    /**
     * @Route ("/oubli", name="oubli")
     * @Template("default/oubli.html.twig")
     */
    public function oubli()
    {
    }

    /**
     * @Route("/dernieres_observations", name="last_observations")
     * @Template("default/last_observations.html.twig")
     */
    public function lastObservations()
    {
    }
}
