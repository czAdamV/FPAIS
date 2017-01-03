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

    public function actionList($place = 1, $time = null) {
        if($time == null){
            $time = time();
        }
        $filter = new \FPAIS\Model\Helpers\TrainingFilter($time, $place);
        $this->template->trainings = $this->trainingManager->getList($filter);
    }

    public function createComponentNewTrainingForm(): \Nette\Application\UI\Form {
        $form = new \Nette\Application\UI\Form();
        $form->addText('date', 'Datum')->setAttribute('type', 'date');
        $form->addText('time', 'Čas')->setAttribute('type', 'time');
        $form->addSelect('place', 'Místo', $this->placeManager->getArray());
        $form->addInteger('min', 'Minimum hráčů');
        $form->addInteger('max', 'Maximum hráčů');
        $form->addSubmit('create', 'Vytvořit');
        $form->onSuccess[] = [$this, 'onSubmitNewTraining'];
        return $form;
    }

    public function onSubmitNewTraining(\Nette\Application\UI\Form $form, $values) {
        $training = \FPAIS\Model\BusinessObject\Training::buildFromEntity(new \FPAIS\Data\Entity\SQLTraining());
        $training->setMinPlayers($values['min']);
        $training->setMaxPlayers($values['max']);
        $training->setStart(new \Nette\Utils\DateTime($values['date']." ".$values['time']));
        $training->setPlace($values['place']);
        $training->setCoach($this->user->getId());
        $this->trainingManager->createTraining($training);
        $this->redirect('this');
    }

    public function createComponentFilterForm(): \Nette\Application\UI\Form {
        $form = new \Nette\Application\UI\Form();
        $form->addSelect('place', 'Místo: ', $this->placeManager->getArray())->setDefaultValue(1);
        $form->addText('time', 'Čas: ')->setDefaultValue(date('Y-m-d H:i'));
        
        $form->addSubmit('create', 'Filtrovat');
        $form->onSuccess[] = [$this, 'onSubmitFilter'];
        return $form;
    }

    public function onSubmitFilter(\Nette\Application\UI\Form $form, $values) {
        
        $filter = [];
        if(isset($values['place'])){
            $filter['place']=$values['place'];
        }
        if(isset($values['time'])){
            $date = new \DateTime($values['time']);
            $date->format('Y-m-d H:i');
            $filter['time']=$date->getTimestamp();
        }
        
        $this->redirect(301, 'Training:list', $filter);
    }

    public function handleJoinTraining($trainingId) {
        $this->trainingManager->addPlayer($trainingId, $this->getUser()->id);
        $this->flashMessage('Byli jste přihlášeni na trénink.');
        $this->redirect('Training:list');
    }

}
