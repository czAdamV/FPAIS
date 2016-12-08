<?php

namespace FPAIS\Data\Entity;

/**
 * Description of SQLTraining
 *
 * @author viky
 */
class SQLTraining extends Training {

    /**
     * @var \Nette\Database\Table\ActiveRow
     */
    private $activeRow;

    public static function buildFromRow(\Nette\Database\Table\ActiveRow $ar): Training {
        $entity = new SQLTraining();
        $entity->activeRow = $ar;
        $entity->id = $ar->trainingID;
        $entity->place = $ar->place;
        $entity->signedPlayers = NULL;
        $entity->coach = NULL;
        $entity->minPlayers = $ar->minPlayers;
        $entity->maxPlayers = $ar->maxPlayers;
        $entity->start = $ar->start;
        return $entity;
    }

    public function getSignedPlayers(): \Nette\Utils\ArrayList {
        if ($this->signedPlayers === NULL) {
            $this->signedPlayers = new \Nette\Utils\ArrayList();
            foreach ($this->activeRow->related('JoinTrainingToPlayer', 'playerID') as $playerRow) {
                $this->signedPlayers[] = SQLPlayer::buildFromRow($playerRow);
            }
        }
        return $this->signedPlayers;
    }

    public function getCoach(): Coach {
        if ($this->coach === NULL) {
            $this->coach = SQLCoach::buildFromRow($this->activeRow->coach);
        }
        return $this->coach;
    }

}
