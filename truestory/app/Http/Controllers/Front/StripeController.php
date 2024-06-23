<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Omnipay\Omnipay;
use App\Models\Payment;
use Session;
use Auth; // Add this line to import the Auth facade

class StripeController extends Controller
{
    private $gateway;

    public function stripeCheckout(Request $request)
    {
        $this->gateway = Omnipay::create('Stripe');
        $this->gateway->setApiKey(env('STRIPE_SECRET'));
        $this->gateway->setTestMode(true);
    }


    public function stripe()
    {
        if (Session::has('order_id')) {
            return view('Admin.payment.stripe');
        } else {
            return redirect('shoping-cart');
        }
    }

    public function pay(Request $request)
{
    try {
        // Make sure the gateway is initialized
        if (!$this->gateway) {
            $this->stripeCheckout($request);
        }

        $stripe_amount = round(Session::get('grand_total') / 84, 2);
        $token = $request->input('stripeToken');
        $response = $this->gateway->purchase(array(
            'amount' => $stripe_amount,
            'currency' => env('STRIPE_CURRENCY'),
            'token' => $token,
            'returnUrl' => url('success'),
            'cancelUrl' => url('error')
        ))->send();

        if ($response->isRedirect) {
            $response->redirect();
        } else {
            return $response->getMessage();
        }
    } catch (\Throwable $th) {
        return $th->getMessage();
    }
}

    public function success(Request $request)
    {
        $payment = new Payment(); // Create a new instance of the Payment model

        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));
            $response = $transaction->send();
            if ($response->isSuccessful()) {
                $arr = $response->getData();
                $payment->order_id = Session::get('order_id');
                $payment->user_id = Auth::user()->id;
                $payment->payment_id = $arr['id'];
                $payment->payer_id = $arr['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr['payer']['payer_info']['email'];
                $payment->amount = $arr['transactions'][0]['amount']['total'];
                $payment->currency = env('STRIPE_CURRENCY');
                $payment->payment_status = $arr['state'];
                $payment->save();
                return "Payment is successful. Your transaction ID is " . $arr['id'];
            } else {
                return $response->getMessage();
            }
        } else {
            return "Payment Declined!";
        }
    }

    public function error()
    {
        return "User declined the payment";
    }
}
