<?php

namespace FPAIS\Data\DAO;

use FPAIS\Data\Entity;
use Nette\Utils;

interface ITrainingDAO {

    public function findById(int $id): Entity\Training;

    public function findBy(array $by): Utils\ArrayList;

    public function findAll(): Utils\ArrayList;

    public function save(Entity\Training $t): int;
    
    public function addPlayer(Entity\Training $t, Entity\User $p);
}
