<?php

namespace App\Http\Controllers;

use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function detail($id){
        $product = product::find($id);

        return view('details', compact('product'));
    }

    public function search(Request $request){
        $search = $request->search;
        $category = $request->categories;

        $product = product::where([['nama', 'like', '%'.$search.'%'],['category_id', $category]])->paginate(6);

        return view('search', compact('product'));
    }

    public function update($id){
        if(auth()->user()->role == 1){
            return redirect()->route('home');
        }

        $product = product::find($id);

        return view('updateproduct', compact('product'));
    }

    public function insert(){
        if(auth()->user()->role == 1){
            return redirect()->route('home');
        }

        return view('insertproduct');
    }

    public function delete(){
        if(auth()->user()->role == 1){
            return redirect()->route('home');
        }

        $product = product::all();

        return view('deleteproduct', compact('product'));
    }
}
