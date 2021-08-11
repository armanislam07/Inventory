<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendor;
use App\Product;
use App\StockIn;
use App\Product_category;
use App\Customer;
use App\InvoiceSell;
use App\InvoiceDetaile;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $vendor = Vendor::count('id');
        $product = Product::count('id');
        $total_customer = Customer::count('id');
        $product_category = Product_category::count('id');
        $total_invoice = InvoiceSell::count('id');
        $total_sell_amount = InvoiceSell::sum('grand_total');
        $total_paid_amount = InvoiceSell::sum('paid_amount');
        $total_due_amount = InvoiceSell::sum('due_amount');
        $total_sell_quantity = InvoiceDetaile::sum('quantity');
        $stock_quantity = StockIn::sum('quantity');
        $current_quantity = StockIn::sum('current_quantity');
        $total_stock_amount = StockIn::sum('total_sell_amount');

        $current_qtys = StockIn::select("current_quantity","buy_price")->get();
        $current_total_amount = 0;
        foreach ($current_qtys as $current_qty => $value) {
            $current_total_amount += $value['current_quantity'] * $value['buy_price'];
        }
        
        $total_profit = ($total_stock_amount - $current_total_amount)-$total_sell_amount;

        // echo "<pre>";
        // print_r([$total_profit]);
        
        return view('home', compact('vendor','product','product_category','stock_quantity','current_quantity','total_customer','total_invoice','total_sell_amount','total_paid_amount','total_due_amount','total_sell_quantity','total_profit'));
    }

}
