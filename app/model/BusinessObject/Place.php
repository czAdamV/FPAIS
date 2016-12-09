<?php

namespace FPAIS\Model\BusinessObject;

/**
 * Description of Place
 *
 * @author viky
 */
class Place {

    use \Nette\SmartObject;

    /**
     * @var \FPAIS\Data\Entity\Place
     */
    protected $entity;

    public static function buildFromEntity(\FPAIS\Data\Entity\Place $t) {
        $this->entity = $t;
    }

}
