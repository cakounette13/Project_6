<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/18/16
 * Time: 1:09 AM
 */
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Symfony2Extension\Context\KernelDictionary;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use UserBundle\Entity\User;

require_once __DIR__.'/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';
/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
	use KernelDictionary;
	/**
	 * Initializes context.
	 *
	 * Every scenario gets its own context instance.
	 * You can also pass arbitrary arguments to the
	 * context constructor through behat.yml.
	 */
	public function __construct()
	{
	}
	/**
	 * @Given I click on :link
	 */
	public function iClickOn($link)
	{
		$page = $this->getSession()->getPage();
		$element = $page->find('css', $link);
		$element->click();
	}
}
