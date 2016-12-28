<?php

namespace FPAIS\Data\Entity;

/**
 * Description of Place
 *
 * @author viky
 */
class Place {

    use \Nette\SmartObject;

    protected $placeID;
    protected $addres;

    function getPlaceID() {
        return $this->placeID;
    }

    function getAddres() {
        return $this->addres;
    }

    function setPlaceID($placeID) {
        $this->placeID = $placeID;
    }

    function setAddres($addres) {
        $this->addres = $addres;
    }

}
