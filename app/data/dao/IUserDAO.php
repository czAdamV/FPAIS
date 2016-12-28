<?php

namespace FPAIS\Data\DAO;

use FPAIS\Data\Entity;
/**
 *
 * @author viky
 */
interface IUserDAO {

    public function findById(int $id): Entity\User;

    public function findBy(array $by): \Nette\Utils\ArrayList;

    public function findAll(): \Nette\Utils\ArrayList;

    public function save(Entity\User $u): int;
}
