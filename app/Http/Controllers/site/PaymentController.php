<?php

namespace App\Http\Controllers\site;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PaymentController extends Controller
{

   public function executePayment(Request $request)
   {
       $apiContext = new \PayPal\Rest\ApiContext(
           new \PayPal\Auth\OAuthTokenCredential(
               config('paypal.client_id'),
               config('paypal.client_secret')
           )
       );

       $paymentId = $request->input('paymentId');
       $payerId = $request->input('PayerID');

       $payment = \PayPal\Api\Payment::get($paymentId, $apiContext);
       $execution = new \PayPal\Api\PaymentExecution();
       $execution->setPayerId($payerId);

       try {
           $result = $payment->execute($execution, $apiContext);
           // Update your system based on the payment result

           return view('payment.success'); // Show success view to the user
       } catch (\Exception $e) {
           // Handle any payment execution errors

           return view('payment.error'); // Show error view to the user
       }
   }




}
