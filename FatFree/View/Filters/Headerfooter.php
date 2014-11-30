<?php
/**
 * Class is responsible of setting up the header and footer template for Phptalview
 * @package FatFree\View\Filters
 * @copyright Copyright (c) 2006-2014 creoLIFE
 * @author Mirek Ratman
 * @version 1.0
 * @since 2014-11-01
 */

namespace FatFree\View\Filters;

class Headerfooter extends \PHPTAL_PreFilter {

   /**
   * @var [string] - header content
   */
   private $_header = '';

   /**
   * @var [string] - footer content
   */
   private $_footer = '';

   /**
   * Method will get footer content
   * @return [string]
   */
   public function getFooter(){
      return $this->_footer;
   }

   /**
   * Method will get header content
   * @return [string]
   */
   public function getHeader(){
      return $this->_header;
   }

   /**
   * Method will set footer content
   * @param [string] $file
   */
   public function setFooter( $file ){
      if( file_exists($file) ){
         $this->_footer = file_get_contents( $file );
      }
   }

   /**
   * Method will set header content
   * @param [string] $file
   */
   public function setHeader( $file ){
      if( file_exists($file) ){
         $this->_header = file_get_contents( $file );
      }
   }

   /**
   * Method will add filter
   * @param [string] $content
   */
   public function filter( $content ){
      return $this->_header . $content . $this->_footer;
   }
}
