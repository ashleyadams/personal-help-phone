<?php

namespace App\Repositories;

use App\Models\Numbers;
use App\Models\Roles;

class NumbersRepository implements NumbersRepositoryInterface
{
    protected $numbersModel;
    protected $rolesModel;

    public function __construct(Numbers $numbersModel, Roles $rolesModel)
    {
        $this->numbersModel = $numbersModel;
        $this->rolesModel = $rolesModel;
    }

    /**
     * Get the first number with role matching owner
     * @return string
     */
    public function getOwnerNumber() {

        $number = $this->numbersModel->with(['roles' => function ($query) {
            $query->where('role_name', '=', 'owner');
        }])->first();

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

        $result = $this->numbersModel->with(['roles' => function ($query) use ($role) {
            $query->where('role_name', '=', $role);
        }])->where('number', '=', $number)->first();

        return ($result !== null);

    }

    /**
     * Get a set of names/numbers with role matching contact
     * @return array<string, string>
     */
    public function getOwnerContacts() {

    }


}
