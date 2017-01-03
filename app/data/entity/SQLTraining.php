<?php

namespace FPAIS\Data\Entity;

/**
 * Description of SQLTraining
 *
 * @author viky
 */
class SQLTraining extends Training {

    use \Nette\SmartObject;

    /**
     * @var \Nette\Database\Table\ActiveRow
     */
    private $activeRow;
    
    private $numericPlace = null;

    public static function buildFromRow(\Nette\Database\Table\ActiveRow $ar): Training {
        $entity = new SQLTraining();
        $entity->activeRow = $ar;
        $entity->id = $ar->trainingID;
        $entity->place = $ar->place;
        $entity->signedPlayers = NULL;
        $entity->coach = $ar->coach;
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
        if (is_numeric($this->coach)) {
            $this->coach = SQLCoach::buildFromRow($this->activeRow->ref('coach'));
        }
        return $this->coach;
    }
    
    public function getPlace(): Place {
        if (is_numeric($this->place)) {
            $this->numericPlace = $this->place;
            $this->place = SQLPlace::buildFromRow($this->activeRow->ref('place'));
            
        }
        return $this->place;
    }
    
    public function getPlaceNumeric(): int {
        if (is_numeric($this->place)) {
            return $this->place;
        }
        return $this->numericPlace;
    }

    public function getCoachId(): int {
        if (is_numeric($this->coach)) {
            return $this->coach;
        }
        return $this->coach->getUserID();
    }

}
