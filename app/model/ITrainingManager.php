<?php

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface ITrainingManager {

    public function createTraining(BusinessObject\Training $t): int;

    public function getTrainings(\FPAIS\Model\BusinessObject\Place $p);

    public function getTraining(int $id) : BusinessObject\Training;
}
