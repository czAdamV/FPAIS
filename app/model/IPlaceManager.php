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
interface IPlaceManager {
    public function getList(Helpers\PlaceFilter $filter = NULL): \Nette\Utils\ArrayList;
}
