<?php

namespace FPAIS\Data\Entity;

/**
 * Description of SQLPlayer
 *
 * @author viky
 */
class SQLPlayer extends Player {

    use \Nette\SmartObject;

    public static function buildFromRow(\Nette\Database\Table\ActiveRow $ar): Player {
        $entity = new SQLPlayer();
        $entity->coachID = $ar->playerID;
        $relatedUser = $ar->ref('user');
        $entity->name = $relatedUser->name;
        $entity->email = $relatedUser->email;
        //...
        return $entity;
    }

}
