<?php

namespace FPAIS\Model\BusinessObject;

/**
 * Description of Training
 *
 * @author viky
 */
class Training {

    use \Nette\SmartObject;

    /**
     * @var \FPAIS\Data\Entity\Training
     */
    protected $entity;

    public static function buildFromEntity(\FPAIS\Data\Entity\Training $t) {
        $this->entity = $t;
    }

}
