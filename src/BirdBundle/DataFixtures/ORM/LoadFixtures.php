<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 9/28/16
 * Time: 8:46 PM
 */

namespace BirdBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Nelmio\Alice\Fixtures;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadFixtures implements FixtureInterface, ContainerAwareInterface
{
	/**
	 * @var ContainerInterface
	 */
	private $container;

	public function setContainer(ContainerInterface $container = null)
	{
		$this->container = $container;
	}

	public function load(ObjectManager $manager)
	{
		Fixtures::load(__DIR__.'/Taxref.yml', $manager);
		Fixtures::load(__DIR__.'/Datas.yml',$manager);
	}
}