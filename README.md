FatFree-PHPTAL
==============

PHPTAL View engine implementation for FatFree Framework (F3)


### Standard FatFree View usage
```
//Standard FatFree View engine
$view = \View::instance();
echo $view->render('view/test.html','text/html');
```


### Basic usage of Phptalview
```
$view = new \FatFree\View\Phptalview();
$view->var1 = 'Header 2';
echo $view->render('view/valid.html','text/html');
```


### More advanced usage of Phptalview
```
$view = new \FatFree\View\Phptalview;

$viewInstance = $view->getInstance();
$viewInstance->setForceReparse(true);
$viewInstance->setPhpCodeDestination(__DIR__ . '/tmp');

$filterHeaderFooter = new \FatFree\View\Filters\Headerfooter;
$filterHeaderFooter->setHeader('view/header.html');
$filterHeaderFooter->setFooter('view/footer.html');
$viewInstance->addPreFilter( $filterHeaderFooter );

echo $view->render('view/content.html','text/html');
```