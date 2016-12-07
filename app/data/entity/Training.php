<?php

namespace FPAIS\Data\Entity;

class Training {

    use Nette\SmartObject;

    private $coach;
    private $place;
    private $signedPlayers;

    function getCoach() {
        return $this->coach;
    }

    function getPlace(): int {
        return $this->place;
    }

    function getSignedPlayers(): array {
        return $this->signedPlayers;
    }

    function setCoach(int $coach) {
        $this->coach = $coach;
    }

    function setPlace(int $place) {
        $this->place = $place;
    }

    function setSignedPlayers(array $signedPlayers) {
        $this->signedPlayers = $signedPlayers;
    }

}
