<?php

namespace FPAIS\Presenters;

/**
 * Description of SignPresenter
 *
 * @author viky
 */
class SignPresenter extends \Nette\Application\UI\Presenter {

    protected function createComponentSignInForm() {
        $form = new \Nette\Application\UI\Form;
        $form->addText('username', 'Uživatelské jméno:')
                ->setRequired('Prosím vyplňte své uživatelské jméno.');
        $form->addSubmit('send', 'Přihlásit');

        $form->onSuccess[] = [$this, 'signInFormSucceeded'];
        return $form;
    }

    /**
     * @param $form Nette\Application\UI\Form
     * @param $values Nette\Utils\ArrayHash
     */
    public function signInFormSucceeded($form, $values) {
        try {
            $this->getUser()->login($values->username);
            $this->redirect('Homepage:');
        } catch (Nette\Security\AuthenticationException $e) {
            $form->addError('Nesprávné přihlašovací jméno nebo heslo.');
        }
    }

}
