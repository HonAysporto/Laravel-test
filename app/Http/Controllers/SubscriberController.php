<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    
    public function register(Request $req) {
        $validation = Validator::make($req->all(), 
        [
            "subscriber_name" => ['required', 'string', 'unique:subscribers'],
            "address" => ['required', 'string'],
            "subscription_date" => ['required', "string"],
            "subscription_expiring_date" => ['required', 'string'],
            "subscription_status" => ['string']
        ]);


        if ($validation->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validation->errors()
            ]);
        } 

        $year = date('Y'); 
        $dayOfYear = date('z') + 1; 
        $lastSubscriber = Subscriber::latest()->first();
        $uniqueNumber = $lastSubscriber ? ((int)substr($lastSubscriber->subscriber_id, -3)) + 1 : 1;

        
        $subscriber_id = sprintf("SUB-%s%03d", $year . $dayOfYear, $uniqueNumber);

         
         $subscriber = Subscriber::create([
             "subscriber_name" => $req->subscriber_name,
             "address" => $req->address,
             "subscriber_id" => $subscriber_id,
             "subscription_date" => $req->subscription_date,
             "subscription_expiring_date" => $req->subscription_expiring_date,
             "subscription_status" => $req->subscription_status
         ]);
 
         return response()->json([
             "status" => true,
             "message" => "Subscriber registered successfully!",
             "subscriber" => $subscriber
         ]);
    }

  
}



// "subscriber_name",
// "Address",
// "subscriber_id",
// 'subscription_date',
// "subscription_expiring_date",
// "subscription_status"
