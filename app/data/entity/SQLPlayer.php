<?php

namespace FPAIS\Data\Entity;

/**
 * Description of SQLPlayer
 *
 * @author viky
 */
class SQLPlayer extends Player {

    use \Nette\SmartObject;
    
    public $coachID;

    public static function buildFromRow(\Nette\Database\Table\ActiveRow $ar): Player {
        $entity = new SQLPlayer();
        $entity->coachID = $ar->playerID;
        $relatedUser = $ar->ref('player');
        $entity->userID = $relatedUser['user'];
        $entity->playerID = $relatedUser['playerID'];
      //  $entity->name = $relatedUser->name;
      //  $entity->email = $relatedUser->email;
        //...
        return $entity;
    }
    
    public function getRole(): string {
        return 'player';
    }
    
    public function getPlayerID(): int {
        return $this->playerID;
    }

}
