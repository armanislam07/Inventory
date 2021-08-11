<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use Auth;
use App\Product_category;
use App\StockIn;
use App\InvoiceSell;
use App\Customer;
use App\InvoiceDetaile;
use Carbon;

class InvoiceSellController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$categories = Product_category::get();
    	if ($request->ajax()) {
    		return response()->json($categories);
    	}
        $check_invoice_no = InvoiceSell::count('id');
        if ($check_invoice_no > 0) {
            $invoice_no_get = InvoiceSell::orderBy('id','desc')
                                ->limit(1)
                                ->pluck('invoice_no')
                                ->first();

            $invoice_no = $invoice_no_get + 1;
            $invoiceDate = Carbon\Carbon::now()->format('Y-m-d');
        }else{
            $invoice_no = 101;
            $invoiceDate = Carbon\Carbon::now()->format('Y-m-d');
        }
    	return view('sellProduct.invoice', compact('categories','invoice_no','invoiceDate'));
    }

    public function fatchIndex(Request $request)
    {
    	$categories = Product_category::get();
    	
    	return response()->json($categories);
    }

    public function fatchChalan()
    {
        $product_id = Input::get('id');
        
        $result = StockIn::where('product',$product_id)->get();
        
        return response()->json($result);
        
    }

    public function fatchChalanPrice()
    {
        $product_id = Input::get('id');
        
        $result = StockIn::where('id',$product_id)->get();
        
        return response()->json($result);
        
    }

    public function invoiceStore(Request $request){
        if (Auth::check()) {
            $result = $request->Input('price');
            $name = $request->Input('customer_name');
            $mobile = $request->Input('mobile');
            $sub_total = $request->Input('sub_total');
            $date = $request->invoice_date;
            $check_customer = Customer::where('customer_mobile',$mobile)->count();
            
            if ($check_customer == 0) {
                $customer = array(
                        'customer_name' => $request->customer_name, 
                        'customer_mobile' => $request->mobile, 
                    );
                $new_customer = Customer::create($customer);
                $customer_id = $new_customer->id;
            }else{
                $customer_id = Customer::where('customer_mobile',$mobile)->pluck('id')->first();
            }

            $invoice = array(
                        'invoice_no' => $request->invoice,
                        'customer_id' => $customer_id,
                        'invoice_date' => $request->invoice_date,
                        'grand_total' => $request->g_total,
                        'paid_amount' => $request->paid_amount,
                        'due_amount' => $request->due_amount,
                    );
                    $new_invoice = InvoiceSell::create($invoice);
                    $invoice_id = $new_invoice->id;
        
            if ($request->product > 0) {
                foreach ($request->product as $product => $p_value) {
                    
                    $final = array(
                                    $sell_product = $request->product[$product],
                                    $sell_quantity = $request->quantity[$product]
                                );
                    $stock_quantity = StockIn::where('product',$sell_product)
                                    ->decrement('current_quantity',$sell_quantity);
                    $invoice_details = array(
                                    'invoice_no' => $invoice_id, 
                                    'customer_id' => $customer_id, 
                                    'cat_id' => $request->cat_id[$product], 
                                    'product_id' => $request->product[$product], 
                                    'chalan_id' => $request->chalan[$product], 
                                    'quantity' => $request->quantity[$product], 
                                    'discount' => $request->discount[$product], 
                                    'discount_type' => $request->discount_type[$product], 
                                    'sub_total' => $request->sub_total[$product], 
                                );
                                InvoiceDetaile::create($invoice_details);                   
                }
            }
            // echo "<pre>";
            // print_r([$invoice_details]);
            return redirect()->back()->with('message', 'Data save successfully');
        }else{
            return redirect('/');
        }
    }

    public function invoicePrint(){
        return view('sellProduct.print_invoice');
    }

    public function create_invoice(Request $request){
        $request->customer_name;
        $request->mobile;
        print_r($request);
    }
}
