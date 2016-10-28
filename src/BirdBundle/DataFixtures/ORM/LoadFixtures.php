<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 9/28/16
 * Time: 8:46 PM
 */

namespace BirdBundle\DataFixtures\ORM;

use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Nelmio\Alice\Fixtures;
class LoadFixtures implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		Fixtures::load(__DIR__.'/Taxref.yml', $manager);
		Fixtures::load(__DIR__.'/Datas.yml',$manager);
	}
}