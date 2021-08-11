@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="container" style="color: #ffffff;">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #607D8B;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-users dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Vendor</p>
                                                        <span class="card-text h4">{{$vendor}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #2196F3;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-smile-o dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Customer</p>
                                                        <span class="card-text h4">{{$total_customer}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card" >

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #CD1A57;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-print dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Invoice</p>
                                                        <span class="card-text h4">{{$total_invoice}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #343D7F; ">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-shopping-bag dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Product</p>
                                                        <span class="card-text h4">{{$product}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #009688;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-archive dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Stock Quantity</p>
                                                        <span class="card-text h4">{{$stock_quantity}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #9C27B0;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-history dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Sold Quantity</p>
                                                        <span class="card-text h4">{{$total_sell_quantity}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #9E9E9E;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-list-alt dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Current Quantity</p>
                                                        <span class="card-text h4">{{$current_quantity}}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #00A78D;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-money dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Sold Amount</p>
                                                        <span class="card-text h4"><i style="padding-right: 10px;">৳</i>{{$total_sell_amount}}/-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #000000;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-ticket dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">                                          
                                                        <p class="card-text h6">Total Paid Amount</p>
                                                        <span class="card-text h4"><i style="padding-right: 10px;">৳</i>{{$total_paid_amount}}/-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card">
                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #795548;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-credit-card dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">
                                                        
                                                        <p class="card-text h6">Total Due Amount</p>
                                                        <span class="card-text h4"><i style="padding-right: 10px;">৳</i>{{$total_due_amount}}/-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="card">

                                        <!-- Text Content -->
                                        <div class="card-body" style="background-color: #3F51B5;">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <i class="fa fa-line-chart dashboard-icon" aria-hidden="true"></i>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <p class="card-text h6">Profit</p>
                                                        <span class="card-text h4"><i style="padding-right: 10px;">৳</i>{{$total_profit}}/-</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection
