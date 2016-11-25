<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/23/16
 * Time: 5:28 PM
 */
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\RawMinkContext;
use Behat\Symfony2Extension\Context\KernelDictionary;

require_once __DIR__.'/../../vendor/phpunit/phpunit/src/Framework/Assert/Functions.php';

class SuperUserContext extends RawMinkContext implements Context, SnippetAcceptingContext {

	use KernelDictionary;

	public function __construct()
	{
	}
}