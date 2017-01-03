<?php

namespace FPAIS\Data\Entity;

/**
 * Description of SQLUser
 *
 * @author viky
 */
class SQLUser extends User {

    use \Nette\SmartObject;

    /**
     * @var \Nette\Database\Table\ActiveRow
     */
    private $activeRow;

    public static function buildFromRow(\Nette\Database\Table\ActiveRow $ar): User {
        $entity = new SQLUser();
        $entity->activeRow = $ar;
        $entity->userID = $ar->userID;
        $entity->name = $ar->name;
        $entity->phone = $ar->phone;
        $entity->reputation = $ar->reputation;
        $entity->email = $ar->email;
        return $entity;
    }

    public function getRole() {
        foreach ($this->activeRow->related('Player.user') as $row){
            return "user";
        }
        foreach ($this->activeRow->related('Coach.user') as $row){
            return "coach";
        }
    }

}
