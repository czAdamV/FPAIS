<?php

namespace FPAIS\Presenters;

/**
 * Description of TrainingPresenter
 *
 * @author viky
 */
class TrainingPresenter extends SecuredPresenter {

    /**
     * @inject 
     * @var \FPAIS\Model\ITrainingManager
     */
    public $trainingManager;

    /**
     * @inject
     * @var \FPAIS\Model\IPlaceManager
     */
    public $placeManager;

    /**
     * @inject
     * @var \FPAIS\Model\IUserManager
     */
    public $userManager;

    public function actionList() {
        $this->template->trainings = $this->trainingManager->getList();
    }

    public function createComponentNewTrainingForm(): \Nette\Application\UI\Form {
        $form = new \Nette\Application\UI\Form();
        $form->addText('date', 'Date')->setAttribute('type', 'datetime-local');
        $form->addSelect('place', 'Místo: ', $this->placeManager->getArray());
        $form->addInteger('min', 'Minimum hráčů');
        $form->addInteger('max', 'Maximum hráčů');
        $form->addSubmit('create', 'vytvořit');
        $form->onSuccess[] = [$this, 'onSubmitNewTraining'];
        return $form;
    }

    public function onSubmitNewTraining(\Nette\Application\UI\Form $form, $values) {
        $training = \FPAIS\Model\BusinessObject\Training::buildFromEntity(new \FPAIS\Data\Entity\SQLTraining());
        $training->setMinPlayers($values['min']);
        $training->setMaxPlayers($values['max']);
        $training->setStart(new \Nette\Utils\DateTime($values['date']));
        $training->setPlace($values['place']);
        $training->setCoach($this->user->getId());
        $this->trainingManager->createTraining($training);
        $this->redirect('this');
    }

    public function handleJoinTraining($trainingId) {
        $this->trainingManager->addPlayer($trainingId, $this->getUser()->id);
        $this->flashMessage('OK');
        $this->redirect('Homepage:');
    }

}
