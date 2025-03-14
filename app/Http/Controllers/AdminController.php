<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

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

}
