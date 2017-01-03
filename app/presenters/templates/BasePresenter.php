<?php

namespace FPAIS\Presenters;

class BasePresenter extends \Nette\Application\UI\Presenter {

    public function startup() {
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }

}
