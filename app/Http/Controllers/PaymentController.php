<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Paypal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
class PaymentController extends Controller
{
    private $apiContext;
    function __construct()
    {
       $paypalConfig = Config::get('paypal');

       $this->apiContext = new ApiContext(
            new OAuthTokenCredential(
                $paypalConfig['client_id'],     // ClientID
                $paypalConfig['secret']      // ClientSecret
            )
       );
    }

    public function payWithPaypal(){
        return "123";
    }
}
