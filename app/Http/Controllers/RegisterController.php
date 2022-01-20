<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    public function index(){
        return view ('register');
    }

    public function val(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:30',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:8|max:255|confirmed',
            'gender' => 'required'
        ]);
        
        $validate['password'] = Hash::make($validate['password']);
        $validate['role'] = 1;

        User::create($validate);
        return redirect('/login');
    }
}
