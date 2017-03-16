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
	 * @Given I should see :arg1 inside :arg2 element
	 */
	public function iShouldSeeInsideElement($text, $arg2)
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

	/**
	 * @Then break
	 */
	public function iBreak()
	{
		fwrite(STDOUT, "\033[s    \033[93m[Breakpoint] Press \033[1;93m[RETURN]\033[0;93m to continue...\033[0m");
		while (fgets(STDIN, 1024) == '') {
		}
		fwrite(STDOUT, "\033[u");
		return;
	}

	/**
	 * @BeforeScenario @fixtures
	 */
	static function iNeedToCreateDatabaseUsing()
	{
		shell_exec('php bin/console f:u:create arthur arthur@gmail.com qwerty');
		shell_exec('php bin/console f:u:promote arthur ROLE_ADMIN');
		shell_exec('php bin/console f:u:create bob bob@gmail.com qwerty');
		shell_exec('php bin/console f:u:promote bob ROLE_SUPER_USER');
        shell_exec('php bin/console f:u:create carine carinedelrieux@gmail.com qwerty');
        shell_exec('php bin/console f:u:promote carine ROLE_ADMIN');
	}
}