<?php
/**
 * Class responsible of setting PHPTAL as a View engine for FatFree Framework
 * @package FatFree\View
 * @copyright Copyright (c) 2006-2014 creoLIFE
 * @author Mirek Ratman
 * @version 1.0
 * @since 2014-11-01
 * @license The MIT License (MIT), Copyright (c) 2014 creoLIFE Miroslaw Ratman, Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the 'Software'), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions: The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. THE SOFTWARE IS PROVIDED 'AS IS', WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 */
namespace FatFree\View;

use Filters\Headerfooter;

class Phptalview extends \View {

    /**
    * @var [mixed] - view instance
    */
    protected $view = '';

    /**
     * Class constructor
     * @param [string] $dirTemplateCache - path to template cache directory
     */
    public function __construct() {
        $this->view = new \PHPTAL();
    } 

    /**
     * Method will set output mode
     * @param [string] $outputMode - [text/html, text/xml, etc.]
     */
    public function setOutputMode( $outputMode ){
        $om = \PHPTAL::HTML5;
        switch( $outputMode ){
            case 'text\xhtml' :
                $om = \PHPTAL::XHTML;
                break;
            case 'text\xml' :
                $om = \PHPTAL::XML;
                break;
        }
        $this->view->setOutputMode( $om );
    }

    /**
     * Class constructor
     * @param [string] $file
     * @param [string] $mime - [text/html, text/xml, etc.]
     * @param [array] $hieve
     * @param [int] $ttl
     * @return [html]
     */
    public function render( $file, $mime = 'text/html', array $hieve = null, $ttl = 0 ){
        try {
            self::setOutputMode( $mime );
            //$this->view->addPreFilter( $this->filterHeaderFooter );
            $this->view->setTemplate( $file );
            return $this->view->execute();
        }
        catch (Exception $e){
            echo "Exception thrown while processing template\n";
            echo $e;
        }
    }

    /**
     * Method will get instance of PHPTAL view
     * @return [mixed]
     */
    public function getInstance(){
        return $this->view; 
    }

    /**
     * Varible setter
     * @param [string] $data
     * @param [string] $value
     */
    public function __set( $data, $value ){
        $this->view->set($data, $value); 
    }

}

