<?php

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface IUserManager {

    public function getList(Helpers\UserFilter $filter = NULL): \Nette\Utils\ArrayList;

    public function getArray(): array;
}
