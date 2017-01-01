<?php

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface IPlaceManager {

    public function getList(Helpers\TrainingFilter $filter = NULL): \Nette\Utils\ArrayList;

    public function getArray(): array;
}
