<?php

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface IUserManager {

    public function getList(Helpers\TrainingFilter $filter = NULL): \Nette\Utils\ArrayList;

    public function getArray(): array;
}
