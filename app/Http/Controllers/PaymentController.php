<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Billplz\Minisite\API;
use Billplz\Minisite\Connect;

class PaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        // Retrieve configuration values from configuration.php or any other appropriate source
        $api_key    = config('billplz.api_key');
        $is_sandbox = config('billplz.is_sandbox');
        $websiteurl = config('app.url');

        // Retrieve form data
        $collection_id = $request->input('collection_id');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $name = $request->input('name');
        $amount = $request->input('amount');
        $description = $request->input('description');
        $reference_1_label = $request->input('reference_1_label');
        $reference_1 = $request->input('reference_1');
        $reference_2_label = $request->input('reference_2_label');
        $reference_2 = $request->input('reference_2');

        // Construct parameter array
        $parameter = [
            'collection_id' => $collection_id,
            'email' => $email ?: 'noreply@billplz.com',
            'mobile' => $mobile ?: '',
            'name' => $name ?: 'No Name',
            'amount' => $amount,
            'callback_url' => $websiteurl . '/callback',
            'description' => $description ?: '',
        ];

        // Construct optional array
        $optional = [
            'redirect_url' => $websiteurl . '/redirect',
            'reference_1_label' => $reference_1_label ?: '',
            'reference_1' => $reference_1 ?: '',
            'reference_2_label' => $reference_2_label ?: '',
            'reference_2' => $reference_2 ?: '',
            'deliver' => 'false',
        ];

        // Initialize Billplz API
        $connect = new Connect($api_key);
        $connect->setStaging($is_sandbox);
        $billplz = new API($connect);

        // Create Bill
        list($rheader, $rbody) = $billplz->toArray($billplz->createBill($parameter, $optional));

        // Handle redirection
        if ($rheader === 200 && isset($rbody['url'])) {
            return redirect()->away($rbody['url']);
        } else {
            // Handle error or fallback
            return redirect()->back()->with('error', 'Failed to create payment.');
        }
    }
}
