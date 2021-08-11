<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Product_category;
use Auth;

class ProductController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
    		$products = Product::get();
    		$categories = Product_category::get();
    		return view('product.product', compact('products','categories'));
    	}else{
    		return redirect('/');
    	}
    }

    public function insertProduct(Request $request)
    {
    	if (Auth::check()) {
    		$product = new Product;
    		$product->cat_id = $request->cat_id;
    		$product->product_name = $request->product_name;
    		$product->product_code = $request->product_code;
    		$product->product_note = $request->product_note;
    		$product->save();
    		return redirect()->route('product.view')->with('message','Product save successfully.');
    	}else{
    		return redirect('/');
    	}
    }
}
