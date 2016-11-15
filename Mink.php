<?php
/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 11/8/16
 * Time: 11:00 AM
 */
require __DIR__.'/vendor/autoload.php';

use Behat\Mink\Driver\Selenium2Driver;
use Behat\Mink\Session;

$driver = new Selenium2Driver();
$session = new Session($driver);
// Important object #1
//$driver = new GoutteDriver();
$driver = new Selenium2Driver();
// Important object #2
$session = new Session($driver);
$session->start();
$session->visit('http://localhost:8000/#Rechercher');
//echo "Status code: ". $session->getStatusCode() . "\n";
echo "Current URL: ". $session->getCurrentUrl() . "\n";
$page = $session->getPage();
echo "". $page;
$session->stop();