<?php

namespace BirdBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DeleteBird extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
	    $builder->add('supprimer', ButtonType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
	    $resolver->setDefaults(array(
		    'data_class' => 'BirdBundle\Entity\Datas',
	    ));
    }

    public function getName()
    {
        return 'bird_bundle_delete_bird';
    }
}
