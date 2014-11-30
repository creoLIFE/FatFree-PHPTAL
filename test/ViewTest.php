<?php
ERROR_REPORTING(E_ALL);

require_once( __DIR__ . '/../vendor/autoload.php');
require_once(__DIR__ . "/../vendor/bcosca/fatfree/lib/base.php");
require_once( __DIR__ . '/../FatFree/View/Phptalview.php');

class PhptalViewTest extends PHPUnit_Framework_TestCase
{
    const DIR_TMP = '/tmp';
    const DIR_DEST = '/dest';
    const DIR_VIEW = '/view';
    const TPL_ENCODING = 'UTF-8';
    const TPL_EXT = 'php';
    const TPL_LIFETIME = '10';
    const FILE_VALID = '/view/valid.html';

    /**
     * @var view
     */
    protected $view;

    public function __construct()
    {
        $this->view = new \FatFree\View\Phptalview();
    }

    public function testRender()
    {
        $this->view->var1 = "Test var";
        $this->assertNotNull( $this->view->render( __DIR__ . self::FILE_VALID ) );
    }

}