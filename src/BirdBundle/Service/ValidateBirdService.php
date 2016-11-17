<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 10/28/16
 * Time: 2:08 PM
 */

namespace BirdBundle\Service;

use BirdBundle\Entity\Datas;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class ValidateBirdService {
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

	public function birdIsValid(Request $request)
    {
        $id = $request->query->get('id');
        $bird = $this->em->find('BirdBundle:Datas',$id );
        if($bird instanceof Datas) {
            $bird->setValid(true);
            $this->em->flush();
            return $this->session->getFlashBag()->add('validation', 'oiseau ajouté');
        }
    }
}