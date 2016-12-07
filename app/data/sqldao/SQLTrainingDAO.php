<?php

namespace FPAIS\Data\SQLDAO;

/**
 * Description of SQLTrainingDAO
 *
 * @author viky
 */
class SQLTrainingDAO implements \FPAIS\Data\DAO\ITrainingDAO {

    /**
     * @var \Nette\Database\Context
     */
    private $database;

    /**
     * @var \Nette\Database\Table\Selection
     */
    private $table;

    function __construct(\Nette\Database\Context $database) {
        $this->table = $database->table('Training');
    }

    public function findBy(array $by): \Nette\Utils\ArrayList {
        $results = $this->table->where($by)->fetchAll();
        foreach ($results as $key => $value) {
            dump($value);
        }
        return new \Nette\Utils\ArrayList($results);
    }

    public function findById(int $id): \FPAIS\Data\Entity\Training {
        
    }

    public function findAll(): \Nette\Utils\ArrayList {
        return $this->findBy([]);
    }

}
