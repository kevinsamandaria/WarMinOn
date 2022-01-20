<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //
    public function index(){
        $user = User::where('id', auth()->user()->id)->first();
        return view('profile', compact('user'));
    }

    public function update(Request $request){
        $validate = $request->validate([
            'name' => 'required|max:30',
            'password' => 'required|min:8|max:255|confirmed',
            'gender' => 'required'
        ]);

        $validate['password'] = Hash::make($validate['password']);

        User::where('id', auth()->user()->id)->update([
            'name' => $validate['name'],
            'password' => $validate['password'],
            'gender' => $validate['gender']
        ]);

        return back()->with('updated', 'Update Profile Success');
    }

}
