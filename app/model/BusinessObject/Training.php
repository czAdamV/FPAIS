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

    public static function buildFromEntity(\FPAIS\Data\Entity\Training $t): Training {
        $newBo = new Training();
        $newBo->entity = $t;
        return $newBo;
    }

    /* lazy loads */

    public function getCoach() {
        return Coach::buildFromEntity($this->entity->getCoach());
    }

    public function getId() {
        return $this->entity->getId();
    }

    public function getPlace() {
        return Place::buildFromEntity($this->entity->getPlace());
    }

    public function getMinPlayers() {
        return $this->entity->getMinPlayers();
    }

    public function getMaxPlayers() {
        return $this->entity->getMaxPlayers();
    }

    public function getStart() {
        return $this->entity->getStart();
    }

    public function setId($id) {
        $this->entity->setId($id);
    }

    public function setPlace($place) {
        $this->entity->setPlace($place);
    }

    public function setMinPlayers($minPlayers) {
        $this->entity->setMinPlayers($minPlayers);
    }

    public function setMaxPlayers($maxPlayers) {
        $this->entity->setMaxPlayers($maxPlayers);
    }

    public function setStart($start) {
        $this->entity->setStart($start);
    }

    public function setCoach($coach) {
        $this->entity->setCoach($coach);
    }

    public function getEntity(): \FPAIS\Data\Entity\Training {
        return $this->entity;
    }

    public function getPlayers(): \Nette\Utils\ArrayList {
        $al = new \Nette\Utils\ArrayList;
        foreach ($this->entity->getPlayers as $value) {
            $al[] = \FPAIS\Data\Entity\SQLPlayer::buildFromRow($value);
        }
        return $al;
    }

}
