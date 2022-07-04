<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Exception;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function register()
    {
        return view('register');
    }
    public function create(Request $request)
    {
        $request->validate([
            'first' => ['required', 'string', 'max:255'],
            'last' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $request->first . " " . $request->last,
            'username' => $request->first,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/auth/login');
    }

    public function auth(Request $request)
    {
        $validated = $request->validate([
            "email" => ['required', 'email:dns'],
            "password" => ['required'],
        ]);

        if (Auth::attempt($validated)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('fail', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/auth/login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user_google    = Socialite::driver('google')->user();
            $user           = User::where('email', $user_google->getEmail())->first();
            if($user != null){
                Auth::login($user, true);
                return redirect()->route('dashboard');
            }
            else{
                $create = User::Create([
                    'email'             => $user_google->getEmail(),
                    'name'              => $user_google->getName(),
                    'password'          => 0,
                    'provider'          => "google",
                    'provider_user_id'  => $user_google->getId(),
                    'email_verified_at' => now()
                ]);
                Auth::login($create, true);
                return redirect()->route('dashboard');
            }
        } 
        catch (Exception $e) {
            return redirect()->route('login');
        }
    }
}
