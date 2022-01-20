<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $product = product::paginate(6);
        return view('/home', compact('product'));
    }
}
