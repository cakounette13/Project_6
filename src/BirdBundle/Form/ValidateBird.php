<?php

namespace BirdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ValidateBird extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder->add('supprimer', SubmitType::class, array(
	    	'attr'=> array('class'=>'deleteBtn btn')))
	    ->add('valider', SubmitType::class,  array(
		    'attr'=> array('class'=> 'download btn')));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
		    'data_class' => null,
	    ));
    }

    public function getName()
    {
        return 'bird_bundle_delete_bird';
    }
}
