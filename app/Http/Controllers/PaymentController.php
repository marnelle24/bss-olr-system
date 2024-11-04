<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PaymentService;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService) 
    {
        $this->paymentService = $paymentService;
    }

    // Create Payment Request
    public function createPayment(Request $request)
    {
        $currency = 'SGD';
        $fullName = $request->registrant['firstName'] . ' ' . $request->registrant['lastName'];
        $data = [
            'amount' => floatval($request->registrant['price']),
            'currency' => $currency,
            'reference_number' => $request->registrant['regCode'],
            "name"             => $fullName,
            "email"            => $request->registrant['email'],
            "purpose"          => 'Event registration with registration code '.$request->registrant['paymentReferenceNo'],
            'allow_repeated_payments' => 'false',
            'expiry_date'      => NULL,
            "send_email"       => 'true',
            "send_sms"         => 'true',
            'redirect_url' => route('login'),
            // 'webhook' => route('payment.webhook'),
        ];

        $paymentRequest = $this->paymentService->createPayment($data);

        // go to the payment page of hitpay if successfull created payment request
        if ($paymentRequest)
            return redirect($paymentRequest['url']);
        
            // or else handle payment failed error.
        return back()->withErrors(['msg' => 'Payment failed']);
    }


}
