<?php
/**
 * Created by PhpStorm.
 * User: moi
 * Date: 16/11/2016
 * Time: 18:28
 */

namespace BirdBundle\Service;

use BirdBundle\Entity\Datas;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class DeleteBirdService {
    /**
     * @var EntityManager
     */
    private $em;
    /**
     * @var Session
     */
    private $session;

    public function __construct(EntityManager $em, Session $session)
    {
        $this->em = $em;
        $this->session = $session;
    }

    public function invalidBirds()
    {
        return $this->em->getRepository("BirdBundle:Datas")->findInvalidBirds();
    }

    public function deleteBird(Request $request)
    {
        $id = $request->query->get('id');
        $bird = $this->em->find('BirdBundle:Datas', $id);
        if ($bird instanceof Datas) {
            $this->em->remove($bird);
            $this->em->flush();
            return $this->session->getFlashBag()->add('deletion', 'oiseau supprimé');
        }
    }
}