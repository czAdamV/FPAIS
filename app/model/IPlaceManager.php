<?php

namespace FPAIS\Model;

/**
 *
 * @author viky
 */
interface IPlaceManager {

    public function getList(Helpers\PlaceFilter $filter = NULL): \Nette\Utils\ArrayList;

    public function getArray(): array;
}
