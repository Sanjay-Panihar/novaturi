<?php

// PhonePeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PhonePeController extends Controller
{
    public function phonepe($grand_total, $mobileNumber) {
        $merchantTransactionId = 'MT' . uniqid();

        $data = array (
           'merchantId' => 'M22E0DIECJTT3',
           'merchantTransactionId' => $merchantTransactionId,
           'merchantUserId' => 'MUID1234',
           'amount' => $grand_total * 100, // Convert grand total to the smallest currency unit (e.g., cents)
           'redirectUrl' => route('response'),
           'redirectMode' => 'REDIRECT',
           'callbackUrl' => route('response'),
           'mobileNumber' => $mobileNumber, // Remove single quotes around $mobileNumber to use its value
           'paymentInstrument' => array (
                'type' => 'PAY_PAGE',
            ),
        );

        $jsonData = json_encode($data);
        $encodedData = base64_encode($jsonData);

        $saltKey = '8dfcf08a-ebf9-4fc1-af0a-006e2b402ff6';
        $saltIndex = '1';

        $string = $encodedData . '/pg/v1/pay' . $saltKey;
        $sha256 = hash('sha256', $string);

        $finalXHeader = $sha256 . '###' . $saltIndex;

        $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'X-VERIFY' => $finalXHeader
            ])
            ->post('https://api.phonepe.com/apis/hermes/pg/v1/pay', [
                'request' => $encodedData
            ]);

        $rData = json_decode($response);
          
        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    }

    public function response() 
    {
        return view('gatewaythanks');
    }
}

