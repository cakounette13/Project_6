<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 8/22/16
 * Time: 11:54 AM
 */

namespace BirdBundle\Service;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\FormFactory;
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

    public function __construct(EntityManager $em, FormFactory $form)
    {
        $this->em = $em;
    }

    public function encodeValidBirds()
    {
	    $datas = $this->em->getRepository('BirdBundle:Datas')->findValidBirds();
	    $encode = array(new XmlEncoder(), new JsonEncoder());
	    $normalizer = array(new ObjectNormalizer());

	    $serializer = new Serializer($normalizer, $encode);

	    return $serializer->serialize($datas, 'json');
    }
}