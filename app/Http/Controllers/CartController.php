<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\product_detail;
use App\Models\cart;

class CartController extends Controller
{
    public function store(Request $request){
        $product = product::where('id',$request->id)->first();

        $stock = $product->detail->stock;

        $validate = $request->validate([
            'quantity'=>"min:1|max:$stock|integer"
        ]);

        if(cart::where('itemName',$product->nama)->exists()){
            $cart = cart::where('itemName',$product->nama)->first();
            cart::where('itemName',$product->nama)->update([
                'quantity' => $cart->quantity + $request->quantity,
                'subtotal' => ($cart->quantity + $request->quantity) * $cart->price
            ]);

        }else{
            $cart['user_id']=auth()->user()->id;
            $cart['itemName']=$product->nama;
            $cart['price']=$product->detail->Price;
            $cart['quantity']=$validate['quantity'];
            $cart['subtotal']=$validate['quantity'] * $product->detail->Price;

            cart::create($cart);
        }

        product_detail::where('product_id', $request->id)->update([
            'stock' => $stock - $validate['quantity']
        ]);

        $cart = cart::where('user_id', auth()->user()->id)->get();
        return view('cart', compact('cart'));
    }

    public function index(){
        $cart = cart::where('user_id', auth()->user()->id)->get();
        return view('cart', compact('cart'));
    }

    public function delete(Request $request){
        $product = product::where('nama',$request->name)->first();
        $stock = $product->detail->stock;

        $cart = cart::where('id', $request->id)->first();

        product_detail::where('product_id', $product->id)->update([
            'stock' => $stock + $cart->quantity
        ]);

        cart::where('id', $request->id)->delete();

        return back();
    }

}
