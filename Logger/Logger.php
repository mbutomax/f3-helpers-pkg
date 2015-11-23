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
  function __construct($file, $lSep = " | ", $format='Y-m-d H:i:s' ) {
    $fw = \Base::instance();
    if ( !is_dir( $dir = $fw->get('LOGS') ) ) {
       mkdir($dir, Base::MODE, TRUE);
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
    $fw = \Base::instance();
    // print a row in the log, only if the F3 DEBUG var
    // is greater or equal to the specified parameter
    if ( $level <= $fw->get('DEBUG') ) {
      $arrVars = array(
        date($this->dFmt),
        (isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : ''),
        $this->uID,
        // TODO
        // aggiungere uno uniqID per controllare la sessione
        $level,
        trim($text)
      );
      $fw->write(
        $this->file,
        join($this->sep, $arrVars).PHP_EOL,
        TRUE
      );
    }
  }
  
}
