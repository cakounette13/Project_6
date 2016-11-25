<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/5/16
 * Time: 2:47 PM
 */

namespace BirdBundle\Service;

use BirdBundle\Entity\Datas;
use BirdBundle\Form\BirdsType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorage;
use Symfony\Component\Security\Core\Authorization\AuthorizationChecker;

class AddBird {

	/**
	 * @var EntityManager
	 */
	private $em;
	/**
	 * @var FormFactory
	 */
	private $form;
	/**
	 * @var UploadFile
	 */
	private $uploadFile;
	/**
	 * @var TokenStorage
	 */
	private $tokenStorage;
	/**
	 * @var AuthorizationChecker
	 */
	private $checker;
	/**
	 * @var Session
	 */
	private $session;

	public function __construct(EntityManager $em, FormFactory $form, UploadFile $uploadFile, TokenStorage $tokenStorage, AuthorizationChecker $checker, Session $session)
	{
		$this->em = $em;
		$this->form = $form;
		$this->uploadFile = $uploadFile;
		$this->tokenStorage = $tokenStorage;
		$this->checker = $checker;
		$this->session = $session;
	}

	public function formBuilder(Request $request)
	{
		$bird = new Datas();
		$user = $this->tokenStorage->getToken()->getUser();
		$form = $this->form->create(BirdsType::class, $bird);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			$form->getData();
			$bird->setMember($user);
			if ($this->checker->isGranted('ROLE_SUPER_USER') )
			{
				$bird->setValid(true);
				$this->session->getFlashBag()->add('nouvelle_observation', 'Votre observation est valide et visible des maintenant');
			}
			else {
				$bird->setValid( false );
				$this->session->getFlashBag()->add( 'nouvelle_observation', 'Votre observation est en attente de validation par un Naturaliste' );
			}
			$this->em->persist($bird);
			$this->em->flush();
		}
		return $form;
	}
}
