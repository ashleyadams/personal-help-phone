<?php

namespace App\Repositories;

use App\Models\Numbers;

class NumbersRepository implements RepositoryInterface
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

    }

    /**
     * Get a set of names/numbers with role matching contact
     * @return array<string, string>
     */
    public function getOwnerContacts() {

    }


}
