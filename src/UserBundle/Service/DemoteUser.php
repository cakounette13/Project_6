<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/17/16
 * Time: 12:07 PM
 */

namespace UserBundle\Service;


use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use UserBundle\Entity\User;

class DemoteUser {

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
	public function demoteUser(Request $request){
		$userId = $request->get('id');
		$user = $this->em->find('UserBundle:User', $userId);
		if ($user instanceof User){
			$user->setRoles(['ROLE_USER']);
			$flash = $this->session->getFlashBag()->add('validation', 'Utilisateur '.$user->getUsername().' retrograde au rang d\'Observateur.' );
			$this->em->flush();
			return $flash;
		}
		return $this->session->getFlashBag()->add('validation', 'Mauvais utilisateur pour cette operation');
	}
}