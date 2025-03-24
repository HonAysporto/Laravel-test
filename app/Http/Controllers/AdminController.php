<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class AdminController extends Controller
{
    
    public function register(Request $req) {

        $validation = Validator::make($req->all(), 
        [
            'first_name' => ['required', 'min:5', 'max:20', 'string'],
            'last_name' => ['required', 'min:5', 'max:20', 'string'],
            'email' => ['required', 'email', 'unique:admins'],
            'phone_number' =>  ['required', 'max:11', 'starts_with:0', 'unique:admins'],
            'address' => ['required', 'min:5', 'string'],
            'department' => ['required', 'string'],
            'roles' => ['required', 'string'],
            'subscriber_id' => ['required'],
            'password' => ['required', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/']
        ], [
            'password' => 'Password must contain Letters, numbers and special characters'
        ]);


        if ($validation->fails()) {
           return response()->json([
            'status' => false,
            'message' => $validation->errors(),
           ]);
        } else {

            $save = Admin::create([
                'first_name' => $req->first_name,
                'last_name' => $req->last_name,
                'email' => $req->email,
                'phone_number' => $req->phone_number,
                'address' => $req->address,
                'department' => $req->department,
                'roles' => $req->roles,
                'subscriber_id'=> $req->subscriber_id,
                'permission' => json_encode($req->permission),
                'password' => Hash::make($req->password)
            ]);

            if ($save) {
                return response()->json([
                    'status' => true,
                    'message' => 'User saved successfully',
                   ]);
            } else {
                return response()->json([
                    'status' => false,
                    'message' => 'An error occuredt  while saving user',
                   ]);
            }

        }
    }





    public function signin(Request $req) {
        $credentials = $req->validate([
            'email'=> ['required', 'email'],
            'password' => ['required']
        ]);
    
        if (!$token = Auth::guard('admin')->attempt($credentials)) {
            return response()->json([
                'status' => false,
                'errors' => 'Provided credentials do not match our records'
            ], 401);
        }


         //Fetch Subscriber details from admin

        $subscribers = Admin::where('email', $req->email)
        ->join('subscribers', 'admins.subscriber_id', '=', 'subscribers.id')
        ->select('subscribers.*')
        ->first();

    
        $admin = Auth::guard('admin')->user();

        return response()->json([
            'status' => true,
            'message' => 'Admin Found',
            'token' => $token,
            'admin' => $admin->makeHidden(['password', 'created_at', 'updated_at']),
            "subscriber" => $subscribers 
        ]);
    }



    //Fetch Subscriber details from admin

    // public function fetchSubcriberDetails(Request $req) {
    //     $subscribers = Admin::where('email', $req->email)
    // ->join('subscribers', 'admins.subscriber_id', '=', 'subscribers.id')
    // ->select('subscribers.*')
    // ->get();
    // return response()->json($subscribers);
    // }
    
    
    }



//     {
//         "first_name" : "Adebayo",
//          "last_name" : "Stephen",
//          "email" : "ayomideoluwafemi2019@gmail.com",
//          "phone_number" : "09037103819",
//          "address" : "No 2, adebayo street, olodo, Ibadan",
//          "department" : "Marketing",
//          "roles" : "NRY",
//          "permission" :  ["DMA", "NNO", "TPP"],
//          "password" : "Ayofemi2025!",
//          "subscriber_id": "SUB-202579001"
//  }


