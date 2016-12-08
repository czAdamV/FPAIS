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

    function getPlace(): int {
        return $this->place;
    }

    abstract function getSignedPlayers(): \Nette\Utils\ArrayList;

    function setCoach(int $coach) {
        $this->coach = $coach;
    }

    function setPlace(int $place) {
        $this->place = $place;
    }

}
