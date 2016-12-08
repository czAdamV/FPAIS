<?php

namespace FPAIS\Data\SQLDAO;

use FPAIS\Data\Entity;

/**
 * Description of SQLTrainingDAO
 *
 * @author viky
 */
class SQLTrainingDAO implements \FPAIS\Data\DAO\ITrainingDAO {

    /**
     * @var \Nette\Database\Table\Selection
     */
    private $table;

    function __construct(\Nette\Database\Context $database) {
        $this->table = $database->table('Training');
    }

    public function findBy(array $by): \Nette\Utils\ArrayList {
        $results = $this->table->where($by)->fetchAll();
        $entities = new \Nette\Utils\ArrayList();
        foreach ($results as $ar) {
            $entities[] = Entity\SQLTraining::buildFromRow($ar);
        }
        return $entities;
    }

    public function findById(int $id): Entity\Training {
        throw new Exception('not implemented yet');
    }

    public function findAll(): \Nette\Utils\ArrayList {
        return $this->findBy([]);
    }

    public function save(Entity\Training $t): int {
        throw new Exception('not implemented yet');
    }

}
