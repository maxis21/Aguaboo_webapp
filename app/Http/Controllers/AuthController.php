<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
        // --------------- login Functions ------------------

        public function displayLogin(){
            return view('admin.login');
        }
    
    
        function loginStaff(Request $request){
    
            $request->validate([
                'email_address' => 'required',
                'password' => 'required'
            ]);
    
            $credentials = $request->only('email_address', 'password');
    
            if (Auth::attempt($credentials)) {
                return redirect()->intended(route('view.dashboard'));
            }
    
            return back()->withErrors([
                'email_address' => 'The provided credentials do not match our records.',
            ]);
        }
}
