<?php

namespace Logger;

/**
 * Class to manage a simple text log file
 *
 * @author mbuto
 */
class Logger {
  
  protected $file;	//! File name
  protected $sep;	//! log values separator
  protected $dFmt; //! default date Format
  protected $uID; //! identificativo unico della sessione in corso


  /**
  *	Instantiate class
  *	@param $file string
  **/
  function __construct($logDir, $file, $lSep = " | ", $format='Y-m-d H:i:s' ) {
    if ( !is_dir( $dir = $logDir ) ) {
       mkdir($dir, '0755', TRUE);
    }
    $this->file = $dir.$file;
    $this->sep  = $lSep;
    $this->dFmt = $format;
    $this->uID = uniqid();
  }
  
  /**
   *	Write specified text to log file
   *	@return string
   *	@param $text string
   *	@param $level integer
   */
  function log($text, $level=0) {
        // let the app calling this helper
        // decide and check if to write the line in the log
        // depending on an external value (DEBUG, TEST, etc)
        $arrVars = array(
          date($this->dFmt),
          (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''),
          $this->uID,
          $level,
          trim($text)
        );
        
        // TODO
        // replace the FatFree Write method with the standard
        // php write on a file handle
        // or extend the log object of FatFree
//        $fw->write(
//          $this->file,
//          join($this->sep, $arrVars).PHP_EOL,
//          TRUE
//        );
  }
  
}
