<?php

namespace FPAIS\Model\Helpers;

/**
 * Používá se pro filtrovnání tréninků abstrakce na filtrováním sloupečků DB
 *
 * @author viky
 */
class TrainingFilter {

    use \Nette\SmartObject;

    public $time = NULL;
    public $place = NULL;

    //...
    function __construct($time = null, $areaID = null) {
        $this->time = $time;
        $this->place = $areaID;
    }
    
    

}
