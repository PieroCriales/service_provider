<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PurchaseController;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

/** All Paypal Details class **/
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;
use Notification;
use Illuminate\Support\Facades\Config;

class PaymentController extends Controller
{
    private $_api_context;

    function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }

    public function index()
    {
        return view('paywithpaypal');
    }

    public function payWithPaypal(Request $request){
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($request->get('amount'));
        $amount->setCurrency('USD');

        $purchase_id = $request->get('purchase_id');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(env("SERVER_LOCAL", 'http://127.0.0.1:8000') . "/status/" . $purchase_id)//Cambiar la direccion dependiendo de su servidor local
            ->setCancelUrl(env("SEVER_LOCAL", "http://127.0.0.1:8000/status"));

       $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
        ->setPayer($payer)
        ->setTransactions(array($transaction))
        ->setRedirectUrls($redirectUrls);

        try {
            $payment->create($this->_api_context);


            return redirect()->away($payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function getPaymentStatus(Request $request, $purchase_id)
    {
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');
        $token = $request->input('token');

        if (!$paymentId || !$payerId || !$token) {
            $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';
            return redirect('/paypal/failed')->with(compact('status'));
        }

        $payment = Payment::get($paymentId, $this->_api_context);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerId);

        /** Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() === 'approved') {
            $status = 'Gracias! El pago a través de PayPal se ha realizado correctamente.';
            $purchase = Purchase::where('id', $purchase_id)->first();
            $purchase->paymented = True;
            $purchase->save();
            return redirect('/home')->with(compact('status'));
        }

        $status = 'Lo sentimos! El pago a través de PayPal no se pudo realizar.';

        return redirect('/home')->with(compact('status'));


    }
}
