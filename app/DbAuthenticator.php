<?php

namespace FPAIS;

/**
 * Description of DbAuthenticator
 *
 * @author viky
 */
class DbAuthenticator implements \Nette\Security\IAuthenticator {

    /**
     * @var Data\DAO\IUserDAO
     */
    private $userDao;

    public function __construct(Data\DAO\IUserDAO $dao) {
        $this->userDao = $dao;
    }

    public function authenticate(array $credentials): \Nette\Security\IIdentity {
        $user = $this->userDao->findBy(['email' => $credentials[0]]);
        if ($user == []) {
            throw new NS\AuthenticationException('User not found.');
        }
        if (count($user) == 1) {
            return new \Nette\Security\Identity($user[0]->getUserID(), $user[0]->getRole(), []);
        } else {
            throw new \Nette\Security\AuthenticationException('Well...');
        }
    }

}
