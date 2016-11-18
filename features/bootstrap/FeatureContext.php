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
	 * @return \Behat\Mink\Element\DocumentElement
	 */

	/**
	 * @When i follow :button
	 */
	public function iFollow($button)
	{
		$this->getPage()->find('css', 'connexion');
	}

    /**
     * @When I fill in ""
     */
    public function iFillIn()
    {
        throw new PendingException();
    }

    /**
     * @Given |I am logged in as moi
     */
    public function iAmLoggedInAsMoi()
    {
        throw new PendingException();
    }

    /**
     * @Given |I am on :arg1
     */
    public function iAmOn($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When |I
     */
    public function i()
    {
        throw new PendingException();
    }

    /**
     * @Given there is user:
     */
    public function thereIsUser(TableNode $table)
    {
        throw new PendingException();
    }

    /**
     * @Given |I am
     */
    public function iAm()
    {
        throw new PendingException();
    }

    /**
     * @When I click :arg1
     */
    public function iClick($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see :arg1 user
     */
    public function iShouldSeeUser($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given there are :arg1 user
     */
    public function thereAreUser($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When |I fill :arg1 with :arg2
     */
    public function iFillWith($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When |I press :arg1
     */
    public function iPress($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then |I should see :arg1
     */
    public function iShouldSee($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given |I am :arg1
     */
    public function iAm2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When |I click :arg1
     */
    public function iClick2($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then |I should see :arg1 user
     */
    public function iShouldSeeUser2($arg1)
    {
        throw new PendingException();
    }



}
