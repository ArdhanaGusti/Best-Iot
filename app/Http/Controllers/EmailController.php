<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmailController extends Controller
{
    public function verify(Request $request){
        if (Auth::user()->email_verified_at == null) {
            $request->user()->sendEmailVerificationNotification();
        }
        return view('verify');
    }
}
