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

    public function getList(array $filter = []) {
        $this->trainingDao->findBy([]);
    }

}
