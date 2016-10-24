<?php

namespace BirdBundle\Form;

use BirdBundle\Repository\TaxrefRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirdsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder
			->add('nom',  EntityType::class, [
            'label' => 'Nom de l\'oiseau',
			'class' => 'BirdBundle:Taxref',
			'query_builder' =>
				function (TaxrefRepository $er) {
					return $er->createQueryBuilder( 't' )
					          ->orderBy( 't.nomComplet', 'ASC' );
				},
			'choice_label' => 'nomComplet' ])
			->add('datevue', DateType::class, [
			    'label' => 'Date de la vue',
                'widget' => 'single_text',
                'format' => 'dd/MM/yyyy',
			    'html5' => false,
            ])
			->add('image', FileType::class)
			->add('longitude', HiddenType::class)
			->add('latitude', HiddenType::class)
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
