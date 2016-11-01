<?php

namespace BirdBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
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
		return;
	}

	/**
	 * @Route("/json", name="json_birds")
	 * @Method("GET")
	 */
	public function jsonDatas()
	{
		$birds  = $this->get( 'search_bird' )->encodeValidBirds();
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
     * @Route("/dernieres_observations", name="last_observations")
     * @Template("default/last_observations.html.twig")
     * @Security("has_role('ROLE_SUPER_USER')")
     */
    public function lastObservationsAction(Request $request)
    {
	    $notValidYet = $this->getDoctrine()->getRepository('BirdBundle:Datas')->findInvalidBirds();
	    return [
	    	'birds' => $notValidYet,
	    ];
    }
}
