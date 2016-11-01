<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/28/16
 * Time: 2:08 PM
 */

namespace BirdBundle\Service;

use BirdBundle\Entity\Datas;
use BirdBundle\Form\DeleteBird;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

class DeleteBirdService {
	/**
	 * @var EntityManager
	 */
	private $em;
	/**
	 * @var FormFactory
	 */
	private $form;

	public function __construct(EntityManager $em, FormFactory $form)
	{
		$this->em = $em;
		$this->form = $form;
	}

	private function createDeleteForms()
	{
		$birds = $this->em->getRepository('BirdBundle:Datas')->findInvalidBirds();
		$deleteForm = array();
		foreach ($birds as $bird)
		{
			$deleteForm[] = $this->form->create(DeleteBird::class, array($bird['id']))
				->add('id', HiddenType::class);
		}
		return $deleteForm;
	}

	public function DeleteBirdForm(Request $request)
	{
		$form = $this->createDeleteForms();
		$form->bind($request);
		if ($form->isValid()) {
			$em = $this->em;
			$entity = $em->getRepository('BirdBundle:Datas')
				->find();
			if (!$entity) {
				throw $this->createNotFoundException('L\'oiseau n\'existe pas.');
			}
			$em->remove($entity);
			$em->flush();
		}
		return $form;
	}
}