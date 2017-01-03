<?php

namespace FPAIS\Data\SQLDAO;

use FPAIS\Data\Entity;

/**
 * Description of SQLUserDAO
 *
 * @author viky
 */
class SQLUserDAO implements \FPAIS\Data\DAO\IUserDAO {

    /**
     * @var \Nette\Database\Table\Selection
     */
    private $table;

    function __construct(\Nette\Database\Context $database) {
        $this->table = $database->table('User');
    }

    public function findAll(): \Nette\Utils\ArrayList {
        
    }

    public function findBy(array $by): \Nette\Utils\ArrayList {
        $results = $this->table->where($by)->fetchAll();
        $entities = new \Nette\Utils\ArrayList();
        foreach ($results as $ar) {
            $entities[] = Entity\SQLUser::buildFromRow($ar);
        }
        return $entities;
    }

    public function findById(int $id): \FPAIS\Data\Entity\User {
        $res = $this->findBy(['userID' => $id]);
        if (count($res) == 1) {
            return $res[0];
        }
        throw new Exception("No such user");
    }

    public function save(\FPAIS\Data\Entity\User $u): int {
        
    }

}
