<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }

    public function login(Request $request){

        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:255'
        ]);

        if($request->remember){
            Cookie::queue('email', $credentials['email'], 120);
        }

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed!!!');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function google(){
        return Socialite::driver('google')->redirect();
    }

    public function googleRedirect(){
        $user = Socialite::driver('google')->user();

        $user = User::firstOrCreate(
            [
                'email' => $user->email
            ],
            [
                'name' => $user->name,
                'password' => Hash::make(Str::random(24))
            ]
        );

        Auth::login($user, true);

        return redirect('/home');
    }
}
