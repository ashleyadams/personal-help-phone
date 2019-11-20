<?php

namespace App\Repositories;

use App\Models\Numbers;

class NumbersRepository implements NumbersRepositoryInterface
{
    protected $numbersModel;

    public function __construct(Numbers $numbersModel)
    {
        $this->numbersModel = $numbersModel;
    }

    /**
     * Get the first number with role matching owner
     * @return string
     */
    public function getOwnerNumber() {

        $number = $this->numbersModel->with('Roles')->where('role_name', '=', 'owner')->first();

        if ($number) {
            return $number->number;
        }

        return '';
    }


    /**
     * Does the number have a specified role
     * @param $number
     * @param $role
     * @return boolean
     */
    public function numberHasRole($number, $role) {

        $result = $this->numbersModel->with('Roles')
            ->where('role_name', '=', $role)
            ->where('number', '=', $number)
            ->first();

        return ($result !== null);

    }

    /**
     * Get a set of names/numbers with role matching contact
     * @return array<string, string>
     */
    public function getOwnerContacts() {

    }


}
