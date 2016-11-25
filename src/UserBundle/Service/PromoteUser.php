<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/17/16
 * Time: 11:42 AM
 */

namespace UserBundle\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use UserBundle\Entity\User;

class PromoteUser {

	/**
	 * @var EntityManager
	 */
	private $em;
	/**
	 * @var Session
	 */
	private $session;

	public function __construct(EntityManager $em, Session $session) {
		$this->em = $em;
		$this->session = $session;
	}
	public function promoteUser(Request $request){
		$userId = $request->get('id');
		$user = $this->em->find('UserBundle:User', $userId);
		if ($user instanceof User){
			$user->setRoles( [ 'ROLE_SUPER_USER' ] );
			$this->em->flush();
			return $this->session->getFlashBag()->add( 'validation', 'Utilisateur ' . $user->getUsername() . ' promu comme Naturaliste.' );
		}
		return $this->session->getFlashBag()->add('validation', 'Mauvais utilisateur pour cette operation');
	}
}