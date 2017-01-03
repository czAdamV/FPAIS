<?php

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface ITrainingManager {

    public function getList(Helpers\TrainingFilter $filter = NULL): \Nette\Utils\ArrayList;

    public function getOneBy(Helpers\TrainingFilter $filter = NULL): \FPAIS\Model\BusinessObject\Training;

    public function createTraining(\FPAIS\Model\BusinessObject\Training $t): int;

    public function getTrainings(\FPAIS\Model\BusinessObject\Place $p, int $start): \Nette\Utils\ArrayList;

    public function getTraining(int $id): \FPAIS\Model\BusinessObject\Training;
    
    public function addPlayer(BusinessObject\Training $t, int $playerId);
}
