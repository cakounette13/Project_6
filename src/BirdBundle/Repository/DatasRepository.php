<?php

namespace BirdBundle\Repository;
use Doctrine\ORM\EntityRepository;

/**
 * DatasRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DatasRepository extends EntityRepository
{
	public function findValidBirds(){
		return $this->createQueryBuilder('d')
			->select('d.latitude', 'd.longitude', 'd.image')
			->join('d.nom', 'dn')
			->addSelect('dn.nomValide', 'dn.nomVern')
			->where('d.valid = :valid')
			->setParameter('valid', true)
			->getQuery()
			->execute();
	}

	public function findInvalidBirds() {
		return $this->createQueryBuilder('d')
            ->select('d.latitude', 'd.longitude', 'd.image', 'd.id')
            ->join('d.nom', 'dn')
			->addSelect('dn.nomValide', 'dn.nomVern')
			->join('d.member', 'dm')
			->addSelect('dm.username')
            ->where('d.valid = :valid')
            ->setParameter('valid', false)
            ->getQuery()
            ->execute();
	}
}
