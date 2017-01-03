<?php

namespace FPAIS\Presenters;

/**
 * Description of SecuredPresenter
 *
 * @author viky
 */
class SecuredPresenter extends BasePresenter{


    public function startup() {
        parent::startup();
        if (!$this->getUser()->isLoggedIn()) {
            $this->redirect('Sign:in');
        }
    }

}
