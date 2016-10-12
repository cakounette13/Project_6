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

	public function formBuilder()
	{
		$bird = new Datas();
		$form = $this->form->create(BirdsType::class, $bird)->createView();
		return $form;
	}
}