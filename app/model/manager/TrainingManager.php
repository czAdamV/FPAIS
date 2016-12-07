<?php

namespace FPAIS\Model\Manager;

use FPAIS\Model;

/**
 * Description of TrainingManager
 *
 * @author viky
 */
class TrainingManager implements \FPAIS\Model\ITrainingManager {

    use \Nette\SmartObject;

    /**
     * @var \FPAIS\Data\DAO\ITrainingDAO
     */
    private $trainingDao;

    function __construct(\FPAIS\Data\DAO\ITrainingDAO $trainingDao) {
        $this->trainingDao = $trainingDao;
    }

    public function getList(array $filter = []) {
        $res =  $this->trainingDao->findBy($filter);
        //convert to BO
        
        foreach ($res as $key => $line) {
            
        }
    }

    public function getOneBy(array $filter = []): Model\BusinessObject\Training {
        return NULL;
    }

}
