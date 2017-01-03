<?php

namespace FPAIS\Data\Entity;

/**
 * Description of User
 *
 * @author viky
 */
abstract class User {

    use \Nette\SmartObject;

    protected $banedTo;
    protected $email;
    protected $name;
    protected $phone;
    protected $reputation;
    protected $userID;

    function getBanedTo() {
        return $this->banedTo;
    }

    function getEmail() {
        return $this->email;
    }

    function getName() {
        return $this->name;
    }

    function getPhone() {
        return $this->phone;
    }

    function getReputation() {
        return $this->reputation;
    }

    function getUserID() {
        return $this->userID;
    }

    function setBanedTo($banedTo) {
        $this->banedTo = $banedTo;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPhone($phone) {
        $this->phone = $phone;
    }

    function setReputation($reputation) {
        $this->reputation = $reputation;
    }

    function setUserID($userID) {
        $this->userID = $userID;
    }

    abstract function getRole(): string;
}
