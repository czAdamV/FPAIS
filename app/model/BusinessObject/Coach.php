<?php

namespace FPAIS\Model\BusinessObject;


/**
 * Description of Coach
 *
 * @author viky
 */
class Coach {

    use \Nette\SmartObject;

    /**
     * @var \FPAIS\Data\Entity\Coach
     */
    protected $entity;

    public static function buildFromEntity(\FPAIS\Data\Entity\Coach $entity): Coach {
        $newBo = new Coach();
        $newBo->entity = $entity;
        return $newBo;
    }

    function getBanedTo() {
        return $this->entity->getBanedTo();
    }

    function getEmail() {
        return $this->entity->getEmail();
    }

    function getName() {
        return $this->entity->getName();
    }

    function getPhone() {
        return $this->entity->getPhone();
    }

    function getReputation() {
        return $this->entity->getReputation();
    }

    function getUserID() {
        return $this->entity->getUserID();
    }

}
