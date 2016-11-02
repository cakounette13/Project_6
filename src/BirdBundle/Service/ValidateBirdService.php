<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/28/16
 * Time: 2:08 PM
 */

namespace BirdBundle\Service;

use BirdBundle\Entity\Datas;
use BirdBundle\Form\ValidateBird;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

class ValidateBirdService {
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
			$form = $this->form->create(ValidateBird::class, $bird)
				->add('id', HiddenType::class, array('data' => $bird['id']));
			$deleteForm[] = $form->createView();
		}
		dump($deleteForm);
		return $deleteForm;
	}

	public function DeleteBirdForm(Request $request)
	{
		$form = $this->createDeleteForms();
		return $form;
	}
}