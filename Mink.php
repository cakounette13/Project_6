<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/8/16
 * Time: 11:00 AM
 */
require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\GoutteDriver;
use Behat\Mink\Session;

$driver = new GoutteDriver();
$session = new Session($driver);

$session->start();
$session->visit('http://localhost:8000/#secondPage');
echo "Status code: ". $session->getStatusCode() . "\n";
echo "Current URL: ". $session->getCurrentUrl() . "\n";

$page = $session->getPage();

echo "First 715 chars: ".substr($page->getText() , 0, 715) . "\n";