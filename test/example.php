<?php
require_once( __DIR__ . '/../vendor/autoload.php');
$f3 = require (__DIR__ . "/../vendor/bcosca/fatfree/lib/base.php");
require_once( __DIR__ . '/../FatFree/View/Phptalview.php');
require_once( __DIR__ . '/../FatFree/View/Filters/Headerfooter.php');

//Standard FatFree View engine
$view = \View::instance();
echo $view->render('view/test.html','text/html');
echo "\n---------\n";

//PhpTal View engine
$view = new \FatFree\View\Phptalview();
$view->var1 = 'Header 2';
echo $view->render('view/valid.html','text/html');
echo "\n---------\n";

//PhpTal View engine with header and footer separated and some functionality from PHPTAL
$view = new \FatFree\View\Phptalview;

$viewInstance = $view->getInstance();
$viewInstance->setForceReparse(true);
$viewInstance->setPhpCodeDestination(__DIR__ . '/tmp');

$filterHeaderFooter = new \FatFree\View\Filters\Headerfooter;
$filterHeaderFooter->setHeader('view/header.html');
$filterHeaderFooter->setFooter('view/footer.html');
$viewInstance->addPreFilter( $filterHeaderFooter );

echo $view->render('view/content.html','text/html');
echo "\n---------\n";