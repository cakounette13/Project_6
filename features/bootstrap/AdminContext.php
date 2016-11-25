<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/23/16
 * Time: 5:27 PM
 */
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Symfony2Extension\Context\KernelDictionary;

require_once __DIR__.'/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';
class AdminContext extends RawMinkContext implements Context, SnippetAcceptingContext {

	use KernelDictionary;
	public function __construct()
	{
	}
	/**
	 * @Then I should see the following table portion:
	 */
	public function iShouldSeeTheFollowingTablePortion(TableNode $table)
	{
		throw new PendingException();
	}
	/**
	 * @Then I should see a table with :arg1 inside
	 */
	public function iShouldSeeATableWithInside($username)
	{
		$row = $this->getSession()->getPage()->find('css', sprintf('table tr:contains("%s")', $username));
		if (!$row) {
			throw new \Exception(sprintf('Cannot find any row on the page containing the text "%s"', $username));
		}
	}
}