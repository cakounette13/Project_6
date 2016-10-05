<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/5/16
 * Time: 2:47 PM
 */

namespace BirdBundle\service;

use BirdBundle\Entity\Datas;
use Blackfire\Profile\Request;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormFactory;

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

	public function addBird()
	{
		$bird = new Datas();
		$form = $this->form->create(FormType::class, $bird);
		return $form;
	}
}