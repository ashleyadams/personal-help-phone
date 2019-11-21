<?php

namespace App\Http\Controllers;

class CallerController extends TwilioController
{

    public function index() {

        if ($this->isOwner()) {

            $this->response->say('Welcome, please select a contact to call.');

            // Query database for up to 10 contact numbers, say each one's name with incrementing index for button to press
            // Route to new endpoint (same controller, method with argument of selected item)

        } else {

            $this->response->say('Not the owner!');

            // Check for user role, if present make outbound request to call the owner number

            // Otherwise no access granted using caller id, request pin

        }

        return $this->render();
    }


    // @todo - This should probably be in its own service class or middleware

    // @todo - We need to filter the numbers to remove + or leading 0 if present, add country code if missing

    private function isOwner() {
        $ownerNumber = $this->numbersRepository->getOwnerNumber();

        return $this->getCaller() === $ownerNumber;
    }
}
