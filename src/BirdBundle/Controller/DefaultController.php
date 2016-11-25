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
	 * @Template("index/index.html.twig")
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
	 * @Route("/observation", name="add_observation")
	 * @Template("observation/observation.html.twig")
	 * @Security("has_role('ROLE_USER')")
	 */
	public function addObservationAction(Request $request)
	{
		$form = $this->get('add_bird')->formBuilder($request);
		return ['form' => $form->createView()];
	}

    /**
     * @Route("/contribution", name="last_observations")
     * @Template("contribution/contribution.html.twig")
     * @Security("has_role('ROLE_SUPER_USER')")
     */
    public function lastObservationsAction()
    {
	   $invalidBirds = $this->getDoctrine()->getRepository('BirdBundle:Datas')->findInvalidBirds();
	   return[
	     'birds' => $invalidBirds,
       ];
    }

    /**
     * @Route("/contribution/valider", name="validate_last_bird")
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


    /**
     * @Route("/administration", name="nao_user")
     * @Template("administration/administration.html.twig")
     */
    public function usersAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render('administration/administration.html.twig', array('users' => $users));
    }

}
