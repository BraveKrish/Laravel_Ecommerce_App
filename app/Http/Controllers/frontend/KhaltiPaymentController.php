<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KhaltiPaymentController extends Controller
{
    protected $khaltiService;

    public function __construct()
    {

        $this->khaltiService = new \App\Services\KhaltiService();
    }
    
    public function initiatePayment(Request $request)
    {
        // dd($request->all());
        $user = Auth::user();
        $orderData = [
            "return_url"         => route('khalti.payment.callback'),
            "website_url"        => config('app.url'),
            "amount"             => $request->amount * 100, // Amount in paisa
            "purchase_order_id"  => $request->order_id,
            "purchase_order_name" => "Order #" . $request->order_id,
            "customer_info"      => [
                "name"  => $user->name,
                "email" => $user->email,
                "phone" => $user->phone,
            ],
        ];

        $response = $this->khaltiService->initiatePayment($orderData);
        // dd($response);

        if (isset($response['payment_url'])) {
            return redirect($response['payment_url']);
        } else {
            return response()->json(['error' => 'Payment initiation failed'], 400);
        }
    }

    public function paymentCallback(Request $request)
    {
        $pidx = $request->query('pidx');
        $status = $request->query('status');

        if ($status === 'Completed') {
            $paymentDetails = $this->khaltiService->verifyPayment($pidx);

            if ($paymentDetails['status'] === 'Completed') {
                // Save payment record in DB
                return response()->json(['message' => 'Payment successful', 'data' => $paymentDetails]);
            }
        }

        return response()->json(['error' => 'Payment verification failed'], 400);
    }
}
