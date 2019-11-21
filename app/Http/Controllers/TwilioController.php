<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use Twilio\Rest\Client as TwilioService;
use Twilio\TwiML\VoiceResponse;
use App\Repositories\NumbersRepository;

class TwilioController extends BaseController
{

    protected $twilio;

    protected $response;

    protected $numbersRepository;

    protected $caller = null;

    public function __construct(TwilioService $twilio, NumbersRepository $numbersRepository)
    {
        $this->twilio = $twilio;
        $this->response = new VoiceResponse();
        $this->numbersRepository = $numbersRepository;
    }

    protected function render() {
        return response($this->response, 200)->header('Content-Type', 'text/xml');
    }

    protected function getCaller() {
        if ($this->caller == null && array_key_exists('From', $_REQUEST)) {
            $this->caller = $_REQUEST['From'];
        }

        return $this->caller;
    }


}
