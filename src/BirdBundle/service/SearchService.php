<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 8/22/16
 * Time: 11:54 AM
 */

namespace BirdBundle\service;


use BirdBundle\Entity\Taxref;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class SearchService
{
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

    public function FindBirdsEncodeJson()
    {
        $datas = $this->em->getRepository('BirdBundle:Datas')->findAll();
	    $birds = array();
	    foreach ($datas as $item)
	    {
		    $birds[] = [
			    'nomValide' => $item->getNom()->getNomValide(),
			    'nom' => $item->getNom()->getNomVern(),
			    'lat' => $item->getLatitude(),
			    'lng' => $item->getLongitude()
		    ];
	    }
        $encode = array(new XmlEncoder(), new JsonEncoder());
        $normalizer = array(new ObjectNormalizer());

        $serializer = new Serializer($normalizer, $encode);

        return $serializer->serialize($birds, 'json');
    }

    public function createSearchField(Request $request)
    {
        $search = new Taxref();
        $form = $this->form->create(FormType::class, $search)
            ->add('nomVern', SearchType::class);
        $form->handleRequest($request);
        if ( $form->isValid() && $form->isSubmitted() ) {
            $form = $this->em->getRepository('BirdBundle:Taxref')
                ->findOneBy($form);
            return $form;
        }
        return $form;
    }
}