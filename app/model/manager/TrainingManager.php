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

    public function getList(array $filter = []) : \Nette\Utils\ArrayList{
        $res =  $this->trainingDao->findBy($filter);
        
        $bos = new \Nette\Utils\ArrayList();
        foreach ($res as $line) {
            $bos[] = Model\BusinessObject\Training::buildFromEntity($line);
        }
        return $bos;
    }

    public function getOneBy(array $filter = []): Model\BusinessObject\Training {
        return NULL;
    }

    public function createTraining(Model\BusinessObject\Training $t): int {
        return $this->trainingDao->save($t->entity);
    }

    public function getTraining(int $id): Model\BusinessObject\Training {
        
    }

    public function getTrainings(Model\BusinessObject\Place $p, int $start): \Nette\Utils\ArrayList {
        
    }

}
