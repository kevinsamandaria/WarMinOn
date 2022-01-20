<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;
use App\Models\transaction_detail;
use App\Models\cart;
use App\Models\product;

class TransactionController extends Controller
{
    public function index(){
        $transaction = transaction::where('user_id', auth()->user()->id)->get();
        return view('transaction', compact('transaction'));
    }

    public function store(){
        $transaction['user_id'] = auth()->user()->id;
        transaction::create($transaction);

        $id = transaction::where('user_id', auth()->user()->id)->latest('id')->first();

        $cart = cart::where('user_id', auth()->user()->id)->get();

        foreach($cart as $c){
            $product = product::where('nama', $c->itemName)->first();

            $detail['ItemName'] = $c->itemName;
            $detail['price'] = $c->price;
            $detail['quantity'] = $c->quantity;
            $detail['total'] = $c->subtotal;
            $detail['ItemDetail'] = $product->detail->desc;
            $detail['transaction_id'] = $id->id;

            transaction_detail::create($detail);
            cart::where('id', $c->id)->delete();
        }

        $transaction = transaction::where('user_id', auth()->user()->id)->get();
        return view('transaction', compact('transaction'));
    }

    public function detail(Request $request){
        $id = $request->id;
        $detail = transaction_detail::where('transaction_id', $id)->get();

        return view('transactionDetail', compact('detail'));
    }
}
