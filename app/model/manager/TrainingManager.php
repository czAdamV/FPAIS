<?php

namespace FPAIS\Model\Manager;

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

    public function getList(\FPAIS\Model\Helpers\TrainingFilter $filter = NULL): \Nette\Utils\ArrayList {
        $res = $this->trainingDao->findBy($filter);

        $bos = new \Nette\Utils\ArrayList();
        foreach ($res as $line) {
            $bos[] = \FPAIS\Model\BusinessObject\Training::buildFromEntity($line);
        }
        return $bos;
    }

    public function getOneBy(\FPAIS\Model\Helpers\TrainingFilter $filter = NULL): \FPAIS\Model\BusinessObject\Training {
        return NULL;
    }

    public function createTraining(\FPAIS\Model\BusinessObject\Training $t): int {
        return $this->trainingDao->save($t->entity);
    }

    public function getTraining(int $id): \FPAIS\Model\BusinessObject\Training {
        
    }

    public function getTrainings(\FPAIS\Model\BusinessObject\Place $p, int $start): \Nette\Utils\ArrayList {
        
    }

}
