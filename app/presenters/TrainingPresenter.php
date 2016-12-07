<?php

namespace FPAIS\Presenters;

/**
 * Description of TrainingPresenter
 *
 * @author viky
 */
class TrainingPresenter extends \Nette\Application\UI\Presenter {

    /**
     * @inject 
     * @var \FPAIS\Model\ITrainingManager
     */
    public $trainingManager;

    public function actionList() {
        $this->template->trainings = $this->trainingManager->getList([]);
    }

    public function actionCreate() {


        $this->flashMessage("all good");
    }

}
