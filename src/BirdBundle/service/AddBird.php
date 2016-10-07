<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/5/16
 * Time: 2:47 PM
 */

namespace BirdBundle\service;

use BirdBundle\Entity\Datas;
use BirdBundle\Repository\TaxrefRepository;
use Doctrine\ORM\EntityManager;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
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

	public function __construct(EntityManager $em, FormFactory $form)
	{
		$this->em = $em;
		$this->form = $form;
	}

	public function formBuilder(Request $request)
	{
		$bird = new Datas();
		$em = $this->em;
		$form = $this->form->create(FormType::class, $bird)
			->add('nom',  EntityType::class, [
				'class' => 'BirdBundle:Taxref',
				'query_builder' => function (TaxrefRepository $er) {
					return $er->createQueryBuilder( 't' )
					          ->orderBy( 't.nomComplet', 'ASC' );
				},
				'choice_label' => 'nomComplet'
			])
			->add('datevue')
			->add('latitude')
			->add('longitude')
		;
		$form->handleRequest($request);
		if ( $form->isValid() && $form->isSubmitted() ) {
			$em->persist($bird);
			$em->flush();
			return 'validate';
		}
		return $form;
	}
}