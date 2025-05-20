<?php
    namespace App\Services;
    use Illuminate\Support\Facades\Http;

    class KhaltiService{
        protected $apiUrl;
        protected $lookupUrl;
        protected $secretKey;

        public function __construct()
        {
            $this->apiUrl = env('KHALTI_API_URL');
            $this->lookupUrl = env('KHALTI_LOOKUP_URL');
            $this->secretKey = env('KHALTI_SECRET_KEY');
        }

        public function initiatePayment($orderData)
        {
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $this->secretKey,
                'Content-Type'  => 'application/json',
            ])->post($this->apiUrl, $orderData);

            return $response->json();
        }

        public function verifyPayment($pidx)
        {
            $response = Http::withHeaders([
                'Authorization' => 'Key ' . $this->secretKey,
                'Content-Type'  => 'application/json',
            ])->post($this->lookupUrl, ['pidx' => $pidx]);

            return $response->json();
        }
    }