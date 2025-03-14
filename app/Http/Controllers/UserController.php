<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function register(Request $req) {

        $validation = Validator::make($req->all(), 
        ['fullname' => ['required', 'min:5', 'max:20'],
        'email' => ['required', 'email', 'unique:users'],
        'phone_number' => ['required', 'max:11', 'starts_with:0', 'unique:users'],
        'password'=> ['required', 'min:8', 'regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/']],[
            'password' => 'Password must contain Letters, numbers and special characters'
        ]);

        if ($validation->fails()) {
            return Redirect::route('signup')->with('status', false)->with('errors', $validation->errors());
        } else {
         $save =   User::create([
                'fullname' => $req->fullname,
                'email' => $req->email,
                'phone_number' => $req->phone_number,
                'password' => $req->password
    
            ]);

            if ($save) {
                return Redirect::route('signin')->with('msg', 'welcome to login page');
            } else {
                return 'Error occured, try again';
            }
        }
    }

    public function login(Request $req) {

        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
        $req->session()->regenerate();

        return redirect('/dashboard');
    } else {
        return back()->withErrors([
            'email' => 'Provided credentials do not match our record'
        ]);
    }

    return back()->withErrors([
        'email' => 'Email address is required',
        'password' => 'Password is required'
    ])->withInput();

}
}