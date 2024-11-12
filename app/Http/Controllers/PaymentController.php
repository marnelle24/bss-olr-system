<?php

namespace App\Http\Controllers;

use App\Models\Registrant;
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
            "purpose"          => 'Event registration with registration code '.$request->registrant['regCode'],
            'allow_repeated_payments' => 'false',
            'expiry_date'      => NULL,
            "send_email"       => 'true',
            "send_sms"         => 'true',
            'redirect_url'     => route('registration.success-payment', substr($request->registrant['programCode'], 0, -1)),
            // 'webhook' => route('payment.webhook'),
        ];

        $paymentRequest = $this->paymentService->createPayment($data);

        // go to the payment page of hitpay if successfull created payment request
        if ($paymentRequest)
            return redirect($paymentRequest['url']);
        
            // or else handle payment failed error.
        return back()->withErrors(['msg' => 'Payment failed']);
    }

    public function successPayment( $programCode )
    {
        // Abort when the reference and status is not properly declared
        if( is_null(request()->query('status')) || request()->query('status') !== 'completed' || is_null(request()->query('reference')) )
            return abort(404);

        // Prepare the information
        // Payment Details
        $paymentDetails = $this->paymentService->paymentDetails( request()->query('reference') );

        // Get the registrant information
        $registrant = Registrant::where('regCode', $paymentDetails['reference_number'])->first();

        // update the important payment details in the DB
        $registrant->update([
            'paymentStatus' => 'paid',
            'paymentGateway' => $paymentDetails['payments'][0]['payment_type'],
            'paymentReferenceNo' => $paymentDetails['id'],
            'regStatus' => 'confirmed'
        ]);

        // get it from the Event Programme DB or in the bss-import
        // test data only
        $eventDetails = [
            "title" => "<strong>D6 Family Conference 2025 (25 \u2013 26 July 2025) - Individual<\/strong>",
            "thumb" => "https://www.biblesociety.sg/wp-content/uploads/2024/08/TN-D6-2025-updated.jpg",
        ];

        return view('success-payment', [
            'paymentDetails' => $paymentDetails,
            'registrant' => $registrant,
            'eventDetails' => $eventDetails
        ]);
    }


}
