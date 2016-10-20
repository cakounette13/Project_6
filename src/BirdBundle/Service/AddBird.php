<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/5/16
 * Time: 2:47 PM
 */

namespace BirdBundle\service;

use BirdBundle\Entity\Datas;
use BirdBundle\Form\BirdsType;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

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

	public function __construct(EntityManager $em, FormFactory $form, UploadFile $uploadFile)
	{
		$this->em = $em;
		$this->form = $form;
		$this->uploadFile = $uploadFile;
	}

	public function formBuilder(Request $request)
	{
		$bird = new Datas();
		$form = $this->form->create(BirdsType::class, $bird);
		$form->handleRequest($request);
		if ($form->isValid() && $form->isSubmitted()) {
			$form->getData();
			$em = $this->em;
			$em->persist($bird);
			$em->flush();
		}
		return $form;
	}
}