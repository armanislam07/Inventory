@extends('layouts.master')

@section('content')

<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header h4">{{ __('Invoice') }}</div>
                
	                <div class="card-body">
	                	@if(\Session::has('message'))
				            <div class="alert alert-success">
				                {{ \Session::get('message')}}
				            </div>
				        @endif
	                    <form id="" method="POST" action="{{route('invoice.qty.save')}}">
	                        {{csrf_field()}}

	                        <div class="col-md-6">
		                        <div class="form-group row">
		                            <label for="customer_name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

		                            <div class="col-md-6">
		                                <input id="customer_name" type="text" class="form-control @error('customer_name') is-invalid @enderror" name="customer_name" value="{{ old('customer_name') }}" required autocomplete="customer_name" autofocus>

		                                @error('customer_name')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile Number') }}</label>

		                            <div class="col-md-6">
		                                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile">

		                                @error('mobile')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Invoice No.') }}</label>

		                            <div class="col-md-6">
		                                <input id="invoice" type="number" class="form-control @error('invoice') is-invalid @enderror" name="invoice" required autocomplete="invoice" value="{{$invoice_no}}" readonly>

		                                @error('invoice')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
		                        </div>

		                        <div class="form-group row">
		                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Invoice Date') }}</label>

		                            <div class="col-md-6">
		                                <input id="invoice_date" type="date" class="form-control" name="invoice_date" value="{{$invoiceDate}}" required autocomplete="invoice_date" readonly>
		                            </div>
		                        </div>
	                    	</div>

	                    	<div class="">
	                    		<div class="col-md-12">
	                    			<table class="table ">
	                    				<thead class="alert alert-primary">
	                    					<tr class="text-center">
	                    						<th>#</th>
	                    						<th>Category</th>
	                    						<th>Product</th>
	                    						<th>Chalan</th>
	                    						<th>Qty</th>
	                    						<th>Price</th>
	                    						<th>Discount</th>
	                    						<th>Dis Type</th>
	                    						<th>Total</th>
	                    					</tr>
	                    				</thead>
	                    				<tbody class="form-group">
	                    					<tr>
	                    						<th class="h3"><a href="#" id="" class=""><i class="fa fa-trash text text-danger" aria-hidden="true"></i></a></th>
	                    						<td>
	                    							<select class="form-control" id="cat_id" class="cat_id[]" name="cat_id[]" required autocomplete="Category">
	                    								<option value="">--select Category--</option>
	                    								@foreach($categories as $category)
	                    								<option value="{{$category->id}}">{{$category->category}}</option>
	                    								@endforeach
	                    								
	                    							</select>
	                    						</td>
	                    						<td>
	                    							<select class="form-control" id="product" name="product[]" required autocomplete="Product">
	                    								<option value="">select Product</option>
	                    							</select>
	                    						</td>
	                    						<td>
	                    							<select class="form-control" id="chalan" name="chalan[]" required autocomplete="Chalan">
	                    								<option value="">select Chalan</option>
	                    							</select>
	                    						</td>
	                    						<td>
	                    							<input class="form-control text-center" type="number" id="quantity" name="quantity[]" required autocomplete="quantity">
	                    						</td>
	                    						<td>
	                    							<input class="form-control text-md-right" type="number" id="price" name="price[]" required autocomplete="price" readonly>
	                    						</td>
	                    						<td>
	                    							<input class="form-control" type="number" id="discount" name="discount[]" value="" required autocomplete="discount">
	                    						</td>
	                    						<td>
	                    							<select class="form-control" id="dis_type" name="discount_type[]" required autocomplete="discount">
	                    								<option value="-" default>Amount</option>
	                    								<option value="%">%</option>
	                    							</select>
	                    						</td>
	                    						<td>
	                    							<input class="form-control subTotal text-md-right" type="number" id="sub_total" name="sub_total[]" required autocomplete="sub_total" readonly>
	                    						</td>
	                    					</tr>
	                    						
	                    					
	                    				</tbody>
	                    				<tbody class="show">
	                    					<!-- show -->
	                    				</tbody>
	                    				<!-- <tbody>
	                    					<tr class="text-md-right">
	                    						<td></td>
	                    						<td></td>
	                    						<td></td>
	                    						<td></td>
	                    						<td></td>
	                    						<td></td>
	                    						<td colspan="2">Grand Total</td>
	                    						<td ></td>
	                    					</tr>
	                    				</tbody> -->
	                    				

	                    			</table>
	                    			<a class="btn btn-primary" href="#" id="addmore" class="addmore">Add More</a>
	                    		</div>

	                    		<div class="col-md-12">
	                    			<div class="row">
	                    				<div class="col-md-6"></div>
		                    			<div class="col-md-6 text-md-right">
		                    				
		                    				<table class="table table-borderless">
		                    					<tr>
		                    						<td></td>
		                    						<td></td>
		                    						<td>Grand Total:</td>
		                    						<td></td>
		                    						<td><input class="form-control text-md-right" type="number" id="g_total" name="g_total" value="" readonly/></td>
		                    					</tr>
		                    					<tr>
		                    						<td></td>
		                    						<td></td>
		                    						<td>Paid Amount:</td>
		                    						<td></td>
		                    						<td><input class="form-control text-md-right" type="number" id="paid_amount" name="paid_amount" value="" /></td>
		                    					</tr>
		                    					<tr>
		                    						<td></td>
		                    						<td></td>
		                    						<td>Due Amount:</td>
		                    						<td></td>
		                    						<td><input class="form-control text-md-right" type="number" id="due_amount" name="due_amount" value="" readonly/></td>
		                    					</tr>
		                    				</table>
		                    			</div>
	                    			</div>
	                    		</div>
	                    	</div>


	                        <div class="form-group row mb-0">
	                            <div class="col-md-6 offset-md-4">
	                                <button type="submit" id="invoice_save" name="invoice_save" class="btn btn-primary">
	                                    {{ __('Submit') }}
	                                </button>
	                            </div>
	                        </div>

	                    </form>
	                </div>
	            
	            <div class="col-md-6"></div>
            </div>
        </div>
    </div>
    
</div>

@endsection