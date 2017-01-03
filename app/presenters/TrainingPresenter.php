<?php

namespace FPAIS\Presenters;

/**
 * Description of TrainingPresenter
 *
 * @author viky
 */
class TrainingPresenter extends BasePresenter {

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
        $form->addSelect('coach', 'Coach: ', $this->userManager->getArray()); //bere vsechny uzivatele
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
        $training->setCoach($values['coach']);
        $this->trainingManager->createTraining($training);
        $this->redirect('this');
    }

    public function handleJoinTraining($trainingId) {
        //$this->trainingManager->addPlayer($t, $p);
    }

}
