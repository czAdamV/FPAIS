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

    /**
     * @var \FPAIS\Data\DAO\IUserDAO
     */
    private $userDao;

    function __construct(\FPAIS\Data\DAO\ITrainingDAO $trainingDao, \FPAIS\Data\DAO\IUserDAO $uDao) {
        $this->trainingDao = $trainingDao;
        $this->userDao = $uDao;
    }

    public function getList(\FPAIS\Model\Helpers\TrainingFilter $filter = NULL): \Nette\Utils\ArrayList {
        //todo use helper
        if ($filter == NULL) {
            $res = $this->trainingDao->findBy([]);
        } else {
            //todo more params
            $params = array();
            if(isset($filter->place)){
                $params['place'] = $filter->place;
            }
            if(isset($filter->time)){
                $params['start'] = $filter->time;
            }
            $res = $this->trainingDao->findBy($params);
        }

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
        return $this->trainingDao->save($t->getEntity());
    }

    public function getTraining(int $id): \FPAIS\Model\BusinessObject\Training {
        
    }

    public function getTrainings(\FPAIS\Model\BusinessObject\Place $p, int $start): \Nette\Utils\ArrayList {
        
    }

    public function addPlayer(int $trainingId, int $playerId) {
        $trainingtity = $this->trainingDao->findById($trainingId);
        $playerEntity = $this->userDao->findById($playerId);
        $this->trainingDao->addPlayer($trainingtity, $playerEntity);
    }

}
