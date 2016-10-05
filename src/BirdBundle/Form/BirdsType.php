<?php

namespace BirdBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BirdsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
		$builder->add('nom', EntityType::class)
			->add('datevue', DateType::class)
			->add('latitude', IntegerType::class)
			->add('longitude', IntegerType::class)
		;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
		    'data_class' => 'BirdBundle\Entity\Datas'
	    ));
    }

    public function getName()
    {
        return 'bird_bundle_birds_type';
    }
}
