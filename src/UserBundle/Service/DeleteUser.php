<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/22/16
 * Time: 4:59 PM
 */

namespace UserBundle\Service;

use Doctrine\ORM\EntityManager;
use FOS\UserBundle\Doctrine\UserManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use UserBundle\Entity\User;

class DeleteUser {
	/**
	 * @var Session
	 */
	private $session;
	/**
	 * @var UserManager
	 */
	private $userManager;
	/**
	 * @var EntityManager
	 */
	private $em;

	public function __construct(EntityManager $em, Session $session, UserManager $userManager) {
		$this->session = $session;
		$this->userManager = $userManager;
		$this->em = $em;
	}
	public function deleteUser(Request $request){
		$userId = $request->get('id');
		$user = $this->userManager->findUserBy(['id' => $userId]);
		if ($user instanceof User){
			$flash = $this->session->getFlashBag()->add('validation', 'Utilisateur '.$user->getUsername().' supprime.' );
			$this->userManager->deleteUser($user);
			return $flash;
		}
		return $this->session->getFlashBag()->add('validation', 'Mauvais utilisateur pour cette operation');
	}
}