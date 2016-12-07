<?php

namespace FPAIS\Presenters;

/**
 * Description of TrainingPresenter
 *
 * @author viky
 */
class TrainingPresenter extends \Nette\Application\UI\Presenter {

    public function actionList() {
        $this->template->trainings = [['place'=>'none']];
    }

}
