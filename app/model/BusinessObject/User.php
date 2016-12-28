<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FPAIS\Model\BusinessObject;

/**
 * Description of User
 *
 * @author viky
 */
class User {

    use \Nette\SmartObject;

    /**
     * @var \FPAIS\Data\Entity\User
     */
    protected $entity;

    public static function buildFromEntity(\FPAIS\Data\Entity\User $t): User {
        $newBo = new User();
        $newBo->entity = $t;
        return $newBo;
    }

}
