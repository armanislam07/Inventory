<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product_category;
use Auth;

class ProductCategoryController extends Controller
{
    public function index()
    {
    	if (Auth::check()) {
    		$categories = Product_category::get();
    		return view('category.category', compact('categories'));
    	}else{
    		return redirect('/');
    	}
    }

    public function insertCategory(Request $request)
    {
    	if (Auth::check()) {
    		$category = new Product_category;
	    	$category->category = $request->category;
	    	$category->save();
	    	return redirect()->back()->with('message','Category save successfully.');
    	}else{
    		return redirect('/');
    	}    	
    }

    public function editCategory($id)
    {
    	if (Auth::check()) {
    		$category = Product_category::find($id);
    		return view('category.editCategory', compact('category'));
    	}else{
    		return redirect('/');
    	}    	
    }

    public function updateCategory(Request $request, $id)
    {
    	if (Auth::check()) {
    		$category = Product_category::find($id);
	    	$category->category = $request->category_name;
	    	$category->save();
	    	return redirect()->route('product.category')->with('message','Category update successfully.');
    	}else{
    		return redirect('/');
    	}    	
    }
}
