<?php

/**
 * Description of Base
 *
 * @author mbuto
 */

class BaseClass {
  
    protected $f3;
    protected $db;
    protected $mbLog;
    
    // TODO stringa suffisso da inserire prima del testo nel log
    // dovrebbe essere valorizzata in automatico
    // col nome della classe istanziata
    protected $logSuffix;

    /**
     * Costruttore
     * Creazione di una classe di base s cui istanziamo FatFree
     * e un logger di applicazione 
     */
    function __construct() {
 
      $f3=Base::instance();
      $this->f3=$f3;
      $this->mbLog = $this->f3->get('webappLog');
      $this->logSuffix = "[BaseClass]";
      
      $this->log("Creazione istanza core/Utils/BaseClass", 3);

      $this->log("Ho istanziato il FatFree", 3);
    }

    /**
     * Metodo interno per loggare
     * 
     * @param string $text
     * @param int $level
     */
    function log($text, $level=0) {
      $this->mbLog->log( $this->logSuffix . ' ' . $text, $level);
    }
}
