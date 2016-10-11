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
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class AddBird {

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

	public function ajaxFrom()
	{
		$bird = new Datas();
		$form = $this->form->create(BirdsType::class, $bird)->createView();
		return $form;
	}

	public function formBuilder(Request $request)
	{
		$bird = new Datas();
		$em = $this->em;
		$form = $this->form->create(BirdsType::class, $bird);
		$form->handleRequest($request);
		if ( $form->isValid() && $form->isSubmitted() ) {
			$em->persist($bird);
			$em->flush();
			return 'validate';
		}
		return $form;
	}

	public function formValidate(Request $request)
	{
	}
}