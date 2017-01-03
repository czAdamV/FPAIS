<?php

namespace FPAIS\Data\Entity;

/**
 * Description of SQLCoach
 *
 * @author viky
 */
class SQLCoach extends Coach {

    use \Nette\SmartObject;

    public static function buildFromRow(\Nette\Database\Table\ActiveRow $ar): Coach {
        $entity = new SQLCoach();
        $entity->coachID = $ar->coachID;
        $relatedUser = $ar->ref('user');
        $entity->name = $relatedUser->name;
        $entity->email = $relatedUser->email;
        //...
        return $entity;
    }

    public function getRole(): string {
        
    }

}
