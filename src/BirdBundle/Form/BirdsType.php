<?php

namespace BirdBundle\Form;

use BirdBundle\Repository\TaxrefRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirdsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder->add('nom',  EntityType::class, [
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
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
		    'data_class' => 'BirdBundle\Entity\Datas',
	    ));
    }

    public function getName()
    {
        return 'bird_bundle_birds_type';
    }
}
