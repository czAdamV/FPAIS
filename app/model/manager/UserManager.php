<?php

namespace FPAIS\Model\Manager;

/**
 * Description of UserManager
 *
 * @author viky
 */
class UserManager implements \FPAIS\Model\IUserManager {

    use \Nette\SmartObject;

    /**
     * @var \FPAIS\Data\DAO\IUserDAO
     */
    private $userDao;

    function __construct(\FPAIS\Data\DAO\IUserDAO $userDao) {
        $this->userDao = $userDao;
    }

    public function getList(\FPAIS\Model\Helpers\UserFilter $filter = NULL): \Nette\Utils\ArrayList {
        //todo use helper
        $res = $this->userDao->findBy([]);

        $bos = new \Nette\Utils\ArrayList();
        foreach ($res as $line) {
            $bos[] = \FPAIS\Model\BusinessObject\User::buildFromEntity($line);
        }
        return $bos;
    }

    public function getArray(): array {
        $res = $this->userDao->findBy([]);

        $bos = [];
        foreach ($res as $line) {
            $bos[$line->getUserID()] = $line->getName();
        }
        return $bos;
    }

}
