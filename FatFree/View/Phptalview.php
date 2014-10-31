<?php
/**
 * Class is responsible of setting up the header and footer template 
 * @package FatFree/View
 * @copyright Copyright (c) 2006-2014 creoLIFE
 * @author Mirek Ratman
 * @version 1.0
 * @since 2014-11-01
 */
namespace FatFree\View;

class Phptalview extends \View {

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
            $this->view->setTemplate( $file );
            return $this->view->execute();
        }
        catch (Exception $e){
            echo "Exception thrown while processing template\n";
            echo $e;
        }
    }

    /**
     * Method will set encoding
     * @param [string] $encoding - example utf-8
     */
    public function setEncoding( $encoding ){
        $this->view->setEncoding( $encoding ); 
    }

    /**
     * Method will set repository path
     * @param [mixed] $path
     */
    public function setTemplateRepository( $path ){
        $this->view->setTemplateRepository( $path ); 
    }

    /**
     * Method will set destination directory of PHP files
     * @param [mixed] $path
     */
    public function setPhpCodeDestination( $path ){
        $this->view->setPhpCodeDestination( $path ); 
    }

    /**
     * Method will set PHP files extension
     * @param [string] $ext
     */
    public function setPhpCodeExtension( $ext ){
        $this->view->setPhpCodeExtension( $ext ); 
    }

    /**
     * Method will set PHP files extension
     * @param [int] $lifetime - in days
     */
    public function setCacheLifetime( $lifetime ){
        $this->view->setCacheLifetime( $lifetime ); 
    }

    /**
     * Method will force PHPTAL to reparse template
     * @param [boolean] $force - in days
     */
    public function setForceReparse( $force ){
        $this->view->setForceReparse( $force ); 
    }

    /**
     * Method will get encoding
     * @return [string]
     */
    public function getEncoding(){
        return $this->view->getEncoding(); 
    }

    /**
     * Method will get destination directory of PHP files
     * @return [string]
     */
    public function getPhpCodeDestination(){
        return $this->view->getPhpCodeDestination();
    }

    /**
     * Method will get PHP files extension
     * @return [string]
     */
    public function getPhpCodeExtension(){
        return $this->view->getPhpCodeExtension(); 
    }

    /**
     * Method will get PHP files extension
     * @return [string]
     */
    public function getCacheLifetime(){
        return $this->view->getCacheLifetime(); 
    }

    /**
     * Method will get PHPTAL attribute of force reparse
     * @return [boolean]
     */
    public function getForceReparse(){
        return $this->view->getForceReparse(); 
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

