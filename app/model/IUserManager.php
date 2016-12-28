<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface IUserManager {

    public function getList(Helpers\UserFilter $filter = NULL): \Nette\Utils\ArrayList;
}
