<?php

namespace App\Http\Controllers;

class CallerController extends TwilioController
{

    public function index() {

        if ($this->isOwner()) {

            $this->response->say('Welcome, please select a contact to call.');

        } else {

            $this->response->say('Not the owner!');

        }

        return $this->render();
    }


    // @todo - This should probably be in its own service class or middleware
    private function isOwner() {
        $ownerNumber = $this->numbersRepository->getOwnerNumber();

        return $this->getCaller() == $ownerNumber;
    }
}
