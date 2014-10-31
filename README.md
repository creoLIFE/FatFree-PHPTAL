FatFree-PHPTAL
==============

PHPTAL View engine implementation for FatFree Framework (F3)


### Usage

```
$view = new \FatFree\View\Phptalview();
$view->setPhpCodeDestination(__DIR__ . '/tmp');
$view->var1 = 'Header 2';
echo $view->render('view/valid.html','text/html');
```
