<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FPAIS\Model\Manager;

/**
 * Description of PlaceManager
 *
 * @author viky
 */
class PlaceManager implements \FPAIS\Model\IPlaceManager {

    use \Nette\SmartObject;

    /**
     * @var \FPAIS\Data\DAO\IPlaceDAO
     */
    private $placeDao;

    function __construct(\FPAIS\Data\DAO\IPlaceDAO $userDao) {
        $this->placeDao = $userDao;
    }

    public function getList(\FPAIS\Model\Helpers\TrainingFilter $filter = NULL): \Nette\Utils\ArrayList {
        throw new Exception("Not implemented yet");
    }

    public function getArray(): array {
        //todo use helper
        $res = $this->placeDao->findAll();

       $bos = [];
        foreach ($res as $line) {
            $bos[$line->getPlaceID()] = $line->getAddres();
        }
        return $bos;
    }

}
