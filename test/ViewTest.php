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

	public function testSetEncoding()
	{
		$this->view->setEncoding( self::TPL_ENCODING );
		$this->assertEquals($this->view->getEncoding(), self::TPL_ENCODING );
	}

	public function testSetTemplateRepository()
	{
		$this->assertNull( $this->view->setTemplateRepository( __DIR__ . self::DIR_VIEW ) );
	}

	public function testSetPhpCodeDestination()
	{
		$this->view->setPhpCodeDestination( __DIR__ . self::DIR_TMP );
		$this->assertNotNull($this->view->getPhpCodeDestination() );
	}

	public function testSetPhpCodeExtension()
	{
		$this->view->setPhpCodeExtension( self::TPL_EXT );
		$this->assertEquals($this->view->getPhpCodeExtension(), self::TPL_EXT );
	}

	public function testSetCacheLifetime()
	{
		$this->view->setCacheLifetime( self::TPL_LIFETIME );
		$this->assertEquals($this->view->getCacheLifetime(), self::TPL_LIFETIME );
	}

	public function testSetForceReparse()
	{
		$this->view->setForceReparse( false );
		$this->assertFalse($this->view->getForceReparse() );
	}

	public function testRender()
	{
		$this->view->var1 = "Test var";
		$this->assertNotNull( $this->view->render( __DIR__ . self::FILE_VALID ) );
	}

}