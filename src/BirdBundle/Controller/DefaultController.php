<?php

namespace BirdBundle\Controller;

use phpDocumentor\Reflection\DocBlock\Tags\Return_;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
	 * @Method("GET")
	 */
	public function jsonDatas()
	{
		$birds  = $this->get( 'search_bird' )->encodeValidBirds();
		return new JsonResponse($birds);
	}

	/**
	 * @Route("/nouvelle_observation", name="add_observation")
	 * @Template("nouvelle observations/new_observation.html.twig")
	 */
	public function addObservationAction(Request $request)
	{
		$form = $this->get('add_bird')->formBuilder($request);
		return ['form' => $form->createView()];
	}

    /**
     * @Route("/dernieres_observations", name="last_observations")
     * @Template("dernieres observations/last_observations.html.twig")
     * @Security("has_role('ROLE_SUPER_USER')")
     */
    public function lastObservationsAction()
    {
	   $invalidBirds = $this->get('validate_bird')->invalidBirds();
	   return[
	     'birds'=>$invalidBirds,
         dump($invalidBirds)
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

    /**
     * @Route("/administration", name="nao_user")
     * @Template("administration/dashboard.html.twig")
     */
    public function usersAction()
    {
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();
        return $this->render('administration/dashboard.html.twig', array('users' => $users));
    }

}
