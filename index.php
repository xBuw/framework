<?php
/**
 * Created by PhpStorm.
 * User: xbuw
 * Date: 15.03.17
 * Time: 17:55
 */
use xbuw\framework\Application;

$loader = require 'vendor/autoload.php';

$page = new Application();
$page->run();
echo "hi from fram index</br>";
