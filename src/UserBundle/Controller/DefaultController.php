<?php

namespace UserBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
	/**
	 * @Route("/administration", name="nao_user")
	 * @Template("administration/dashboard.html.twig")
	 */
	public function usersAction()
	{
		$users = $this->get('fos_user.user_manager')->findUsers();
		return [ 'users' => $users,
		];
	}

	/**
	 * @param Request $request
	 * @Route("/utilisateurs/promote", name="promote_user")
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function promoteUser(Request $request){
		$user = $this->get('promote_user')->promoteUser($request);
		return $this->redirectToRoute('nao_user', ['result', $user]);
	}

	/**
	 * @param Request $request
	 * @Route("/utilisateurs/demote", name="demote_user")
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function demoteUser(Request $request){
		$user = $this->get('demote_user')->demoteUser($request);
		return $this->redirectToRoute('nao_user', ['result', $user]);
	}

	/**
	 * @param Request $request
	 * @Route("/utilisateur/supprimer", name="delete_user")
	 * @return \Symfony\Component\HttpFoundation\RedirectResponse
	 */
	public function deleteUser(Request $request){
		$user = $this->get('delete_user')->deleteUser($request);
		return $this->redirectToRoute('nao_user', ['result', $user]);
	}
}
