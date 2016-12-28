<?php

namespace FPAIS\Data\Entity;

/**
 * Description of SQLPlace
 *
 * @author viky
 */
class SQLPlace extends Place {

    use \Nette\SmartObject;

    /**
     * @var \Nette\Database\Table\ActiveRow
     */
    private $activeRow;

    public static function buildFromRow(\Nette\Database\Table\ActiveRow $ar): Place {
        $entity = new SQLPlace();
        $entity->activeRow = $ar;
        $entity->placeID = $ar->placeID;
        $entity->addres = $ar->addres;
        return $entity;
    }

}
