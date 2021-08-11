<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use Auth;

class VendorController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
        	$vendors = Vendor::get();        	
        	return view('vendor.vendor', compact('vendors'));
        }else{
        	return redirect('/');
        }
        
    }

    public function insertVendor(Request $request)
    {
    	if (Auth::check()) {

    		$user = Auth::user()->id;
        	$vendor = new Vendor;
        	$vendor->userId = $user;
	    	$vendor->vendorName = $request->vendor_name;
	    	$vendor->vendorCompany = $request->vendor_company;
	    	$vendor->vendorPhone = $request->vendor_mobile;
	    	$vendor->vendorEmail = $request->vendor_email;
	    	$vendor->save();
	    	return redirect()->back()->with('message','Vendor save successfully.');
        }else{
        	return redirect('/');
        }    	
    }

    public function editVendor(Request $request, $id)
    {
    	if (Auth::check()) {
    		
        	$vendor = Vendor::where('id','=',$id)->get()->first();	
        	// echo "<pre>";        	
        	// print_r($vendor);
        	return view('vendor.editVendor', compact('vendor'));
        }else{
        	return redirect('/');
        }
    }

    public function updateVendor(Request $request, $id)
    {
    	if (Auth::check()) {
    		//
        	$vendor = Vendor::find($id);
        	$vendor->vendorName = $request->input('vendor_name');
        	$vendor->vendorCompany = $request->input('vendor_company');
        	$vendor->vendorPhone = $request->input('vendor_mobile');
        	$vendor->vendorEmail = $request->input('vendor_email');
        	$vendor->save();	
        	// echo "<pre>";        	
        	// print_r($vendor);
        	return redirect()->route('vendor.view')->with('message','Update successfully');
        }else{
        	return redirect('/');
        }
    }

    

}
