<?php

namespace BirdBundle\Controller;

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
    public function lastObservationsAction()
    {
	   $invalidBirds = $this->getDoctrine()->getRepository('BirdBundle:Datas')->findInvalidBirds();
	   return[
	     'birds'=>$invalidBirds,
       ];
    }

    /**
     * @Route("/dernieres_observations/valider", name="validate_last_bird")
     * @Security("has_role('ROLE_SUPER_USER')")
     */
    public function validObs(Request $request)
    {
        $validation = $this->get('validate_bird')->birdIsValid($request);
        Return $this->redirectToRoute('last_observations', array('validation', $validation));
    }


    /**
     * @Route("/dernieres_observations/supprimer", name="delete_last_bird")
     * @Security("has_role('ROLE_SUPER_USER')")
     */
    public function deleteObs(Request $request)
    {
        $deletion = $this->get('delete_bird')->deleteBird($request);
        Return $this->redirectToRoute('last_observations', array('deletion', $deletion));
    }
}
