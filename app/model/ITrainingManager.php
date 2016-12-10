<?php

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface ITrainingManager {

    public function getList(array $filter = []): \Nette\Utils\ArrayList;

    public function getOneBy(array $filter = []): \FPAIS\Model\BusinessObject\Training;

    public function createTraining(\FPAIS\Model\BusinessObject\Training $t): int;

    public function getTrainings(\FPAIS\Model\BusinessObject\Place $p, int $start): \Nette\Utils\ArrayList;

    public function getTraining(int $id): \FPAIS\Model\BusinessObject\Training;
}
