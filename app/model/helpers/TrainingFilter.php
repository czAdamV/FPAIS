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
    public $areaID = NULL;

    //...
    function __construct($time, $areaID) {
        $this->time = $time;
        $this->areaID = $areaID;
    }

}
