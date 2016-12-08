<?php

namespace FPAIS\Presenters;

/**
 * Description of TrainingPresenter
 *
 * @author viky
 */
class TrainingPresenter extends \Nette\Application\UI\Presenter {
use \Nette\SmartObject;
    /**
     * @inject 
     * @var \FPAIS\Model\ITrainingManager
     */
    public $trainingManager;

    public function actionList() {
        $this->template->trainings = $this->trainingManager->getList([]);
    }

    public function createComponentNewTrainingForm(): \Nette\Application\UI\Form {
        $form = new \Nette\Application\UI\Form();
        $form->addSubmit('create', 'vytvořit');
        $form->onSuccess[] = [$this, 'onSubmitNewTraining'];
        return $form;
    }

    public function onSubmitNewTraining(\Nette\Application\UI\Form $form, $values) {
        dump($form);
    }

}
