<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\Product_category;
use App\Product;
use App\Vendor;
use App\StockIn;
use DB;

class StockInController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$categories = Product_category::get();
    	
    	$stocks = DB::table('stock_ins')
    				->join('product_categories','stock_ins.cat_id','=','product_categories.id')
                    ->join('products','stock_ins.product','=','products.id')
    				->select('stock_ins.*','product_categories.category','products.product_name')
    				->get();

    	return view('stockIn.stock', compact('categories','stocks'));	
    }

    
    public function fatch(Request $request)
    {
        $cat_id = Input::get('cat_id');
    	$result = Product::where('cat_id',$cat_id)->get();
        return response()->json($result);
        
    }


    public function insertStock(Request $request)
    {
        $quantity = $request->Input('quantity');
        $amount = $request->Input('buy_price');
        $insert_stock = new StockIn;

        $insert_stock->cat_id = $request->Input('cat_id');
        $insert_stock->product = $request->Input('product');
        $insert_stock->vendor = $request->Input('vendor');
        $insert_stock->quantity = $quantity;
        $insert_stock->buy_price = $request->Input('buy_price');
        $insert_stock->sell_price = $request->Input('sell_price');
        $insert_stock->chalan_date = $request->Input('chalan_date');
        $insert_stock->notes = $request->Input('note');
        if ($quantity !== 0) {
            $total_quantity = $quantity;
            $insert_stock->current_quantity = $total_quantity;
            $total_amount = $total_quantity * $amount;
            $insert_stock->total_sell_amount = $total_amount;
        }        
        $insert_stock->save();
        
        return redirect()->back()->with('message','Stock save successfully.');
    }

}
