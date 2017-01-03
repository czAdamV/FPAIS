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
    private $trainingTable;

    /**
     * @var \Nette\Database\Table\Selection
     */
    private $playerToTrainingTable;

    function __construct(\Nette\Database\Context $database) {
        $this->trainingTable = $database->table('Training');
        $this->playerToTrainingTable = $database->table('JoinTrainingToPlayer');
    }

    public function findBy(array $by): \Nette\Utils\ArrayList {
        $start = null;
        if(isset($by['start'])){
            $start = $by['start'];
            unset($by['start']);
        }
        $selection = $this->trainingTable->where($by);
        if(isset($start)){
            $selection->where('start >= ?',$start);
        }
        $results = $selection->fetchAll();
        $entities = new \Nette\Utils\ArrayList();
        foreach ($results as $ar) {
            $entities[] = Entity\SQLTraining::buildFromRow($ar);
        }
        return $entities;
    }

    public function findById(int $id): Entity\Training {
        $res = $this->findBy(['trainingID' => $id]);
        if (count($res) == 1) {
            return $res[0];
        }
        throw new Exception("No such training");
    }

    public function findAll(): \Nette\Utils\ArrayList {
        return $this->findBy([]);
    }

    public function save(Entity\Training $t): int {
        return $this->trainingTable->insert([
                    'start' => $t->getStart(),
                    'minPlayers' => $t->getMinPlayers(),
                    'maxPlayers' => $t->getMaxPlayers(),
                    'coach' => $t->getCoachId(),
                    'place' => $t->getPlaceNumeric(),
                ])->getPrimary();
    }

    public function addPlayer(Entity\Training $t, Entity\User $p) {
        return $this->playerToTrainingTable->insert([
                    'playerID' => $p->getUserID(),
                    'trainingID' => $t->getId(),
        ]);
    }

}
