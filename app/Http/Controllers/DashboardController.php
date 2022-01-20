<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index(){
        if(auth()->user()->role == 1){
            return redirect()->route('home');
        }

        $user = User::where('role', 1)->paginate(10);
        return view('dashboard', compact('user'));
    }

    public function delete(Request $request){
        User::where('id', $request->id)->delete();

        return back();
    }
}
