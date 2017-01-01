<?php

namespace FPAIS\Data\SQLDAO;

use FPAIS\Data\Entity;

/**
 * Description of SQLPlaceDAO
 *
 * @author viky
 */
class SQLPlaceDAO implements \FPAIS\Data\DAO\IPlaceDAO {

    /**
     * @var \Nette\Database\Table\Selection
     */
    private $table;

    function __construct(\Nette\Database\Context $database) {
        $this->table = $database->table('Place');
    }

    public function findAll(): \Nette\Utils\ArrayList {
        return $this->findBy([]);
    }

    public function findBy(array $by): \Nette\Utils\ArrayList {
        $results = $this->table->where($by)->fetchAll();
        $entities = new \Nette\Utils\ArrayList();
        foreach ($results as $ar) {
            $entities[] = Entity\SQLPlace::buildFromRow($ar);
        }
        return $entities;
    }

}
