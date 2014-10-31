<?php
require_once( __DIR__ . '/../vendor/autoload.php');
$f3 = require (__DIR__ . "/../vendor/bcosca/fatfree/lib/base.php");
require_once( __DIR__ . '/../FatFree/View/Phptalview.php');

//Standard FatFree View engine
$view = \View::instance();
echo $view->render('view/test.html','text/html');

//PhpTal View engine
$view = new \FatFree\View\Phptalview();
$view->setPhpCodeDestination(__DIR__ . '/tmp');
$view->var1 = 'Header 2';
echo $view->render('view/valid.html','text/html');