<?php

namespace App\Http\Controllers;

class CallerController extends TwilioController
{

    public function __construct()
    {
        //
    }

    public function index() {
        return 'hello';
    }
}
