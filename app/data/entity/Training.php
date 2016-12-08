<?php

namespace FPAIS\Data\Entity;

abstract class Training {

    use \Nette\SmartObject;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var int|Coach
     */
    protected $coach;

    /**
     * @var int
     */
    protected $place;

    /**
     * @var array
     */
    protected $signedPlayers = NULL;

    /**
     * @var int
     */
    protected $minPlayers;

    /**
     * @var int
     */
    protected $maxPlayers;

    /**
     * @var int
     */
    protected $start;

    abstract function getCoach();

    abstract function getSignedPlayers(): \Nette\Utils\ArrayList;

    function getId() {
        return $this->id;
    }

    function getPlace() {
        return $this->place;
    }

    function getMinPlayers() {
        return $this->minPlayers;
    }

    function getMaxPlayers() {
        return $this->maxPlayers;
    }

    function getStart() {
        return $this->start;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setPlace($place) {
        $this->place = $place;
    }

    function setMinPlayers($minPlayers) {
        $this->minPlayers = $minPlayers;
    }

    function setMaxPlayers($maxPlayers) {
        $this->maxPlayers = $maxPlayers;
    }

    function setStart($start) {
        $this->start = $start;
    }

}
