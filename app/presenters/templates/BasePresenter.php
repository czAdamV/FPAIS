<?php

namespace FPAIS\Presenters;

class BasePresenter extends \Nette\Application\UI\Presenter {

    public function handleLogout() {
        $this->user->logout();
    }

}
