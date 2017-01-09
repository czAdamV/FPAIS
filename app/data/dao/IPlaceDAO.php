<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace FPAIS\Data\DAO;

/**
 *
 * @author viky
 */
interface IPlaceDAO {

    public function findAll(): \Nette\Utils\ArrayList;

    public function findBy(array $by): \Nette\Utils\ArrayList;
}
