<?php

use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Behat\MinkExtension\Context\MinkContext;
use Behat\Mink\Mink;
use Behat\Mink\Session;
use Behat\MinkExtension\Context\RawMinkContext;

/**
 * Defines application features from the specific context.
 */
class FeatureContext extends RawMinkContext implements Context, SnippetAcceptingContext
{
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
	private function getPage()
	{
		return $this->getSession()->getPage();
	}

	/**
	 * @When I fill in the search box with :searchTerm
	 *
	 */
	public function iFillInTheSearchBoxWith($searchTerm)
	{
		$searchBox = $this->getPage()
			->find('css', '[name="inputSearch"]');
		$searchBox->setValue($searchTerm);
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
