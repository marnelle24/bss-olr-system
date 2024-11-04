<?php

/***
 * Handle the Payment process after the registration
 * Only Hitpay Payment gateway for now
 */ 

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;


class PaymentService
{
    protected $client;
    protected $apiKey;
    protected $apiUrl;


    public function __construct() 
    {
        $this->client = new Client();
        $this->apiKey = config('services.hitpay.api_key');
        $this->apiUrl = config('services.hitpay.api_url');
    }

    /***
     * Create a Payment Request 
     */ 
    public function createPayment(array $data)
    {
        try {
            $response = $this->client->post($this->apiUrl . '/payment-requests', [
                'headers' => [
                    'X-Requested-With' => 'XMLHttpRequest',
                    'Content-Type' => 'application/json',
                    'accept' => 'application/json',
                    'X-BUSINESS-API-KEY' => $this->apiKey,
                ],
                'json' => $data,
            ]);

            $responseBody = json_decode($response->getBody(), true);

            if ($response->getStatusCode() === 201) {
                return $responseBody;
            }

            return null;
        } 
        catch (\Exception $e) 
        {
            Log::error('HitPay Payment Creation Failed: ' . $e->getMessage());
            return null;
        }    
    }
}