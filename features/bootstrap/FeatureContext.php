<?php

use Behat\Behat\Context\Context;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Symfony2Extension\Context\KernelDictionary;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context
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

	public function getKernel()
	{
		return $this->kernel;
	}
	
	public function getContainer()
	{
		return $this->kernel->getContainer();
	}

	private function getPage()
	{
		return $this->getSession()->getPage();
	}

	/**
	 * @When I fill in the search box with :term
	 *
	 */
	public function iFillInTheSearchBoxWith($term)
	{
		$searchBox = $this->getPage()
			->find('css', 'input[name="searchTerm"]');
		$searchBox->setValue($term);
	}

	/**
	 * @return \Behat\Mink\Element\DocumentElement
	 */

	/**
	 * @When i follow :button
	 */
	public function iFollow($button)
	{
		$this->getPage()->find('css', 'connexion');
	}

}
