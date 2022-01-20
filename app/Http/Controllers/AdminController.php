<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\product_detail;
use App\Models\User;
use App\Models\Category;
class AdminController extends Controller
{
    public function destroy(Request $request){
        product_detail::where('id', $request->id)->delete();
        product::where('id', $request->id)->delete();

        return back();
    }

    public function delete(Request $request){
        User::where('id', $request->id)->delete();

        return back();
    }

    public function update(Request $request){

        $validate = $request->validate([
            'category_id' => 'required',
            'nama' => 'required|max:25|min:5',
            'desc' => 'required|max:100|min:10',
            'price' => 'required|integer|min:1000|max:10000000',
            'stock' => 'required|min:1',
            'image' => 'image|file|nullable'
        ]);

        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('assets');
            product::where('id', $request->id)->update([
                'image' => $validate['image']
            ]);
        }

        product::where('id', $request->id)->update([
            'category_id' => $validate['category_id'],
            'nama' => $validate['nama']
        ]);

        product_detail::where('product_id', $request->id)->update([
            'desc' => $validate['desc'],
            'stock' => $validate['stock'],
            'Price' => $validate['price']
        ]);

        return back()->with('updated', 'Update Product Success');

    }

    public function insert(Request $request){
        $validate = $request->validate([
            'category' => 'required',
            'nama' => 'required|max:25|min:5',
            'desc' => 'required|max:100|min:10',
            'price' => 'required|integer|min:1000|max:10000000',
            'stock' => 'required|min:1',
            'image' => 'required|image|file'
        ]);

        $category = category::firstOrCreate([
            'categories' => $validate['category']
        ]);

        if($request->file('image')){
            $validate['image'] = $request->file('image')->store('assets');
        }

        $product = new product;
        $product->category_id = $category->id;
        $product->nama = $validate['nama'];
        $product->image = $validate['image'];
        $product->save();

        $id = product::where('nama', $validate['nama'])->first();
        $id = $id->id;

        $detail = new product_detail;
        $detail->product_id = $id;
        $detail->desc = $validate['desc'];
        $detail->Price = $validate['price'];
        $detail->stock = $validate['stock'];
        $detail->save();

        return redirect()->route('home');
    }
}
