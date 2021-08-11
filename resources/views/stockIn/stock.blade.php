@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="block-header">
		<h2>Stock List</h2>
	</div>
	<div class="card">
		@if(count($errors) > 0)
            <div class="alert alert-danger" >
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(\Session::has('error'))
            <div class="alert alert-danger" >
                {{ \Session::get('error')}}
            </div>
        @endif 
        @if(\Session::has('message'))
            <div class="alert alert-success">
                {{ \Session::get('message')}}
            </div>
        @endif
		<div class="header" style="margin-left: 10px;">
			<h1>				
				<!-- Button trigger modal -->
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalScrollable">
				  <i class="fa fa-plus" style="padding-right: 10px;"></i>Create New
				</button>

				<!-- Modal -->
				<div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
				  <div class="modal-dialog modal-dialog-scrollable" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalScrollableTitle">Stock</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form action="{{route('stock.save')}}" method="post">
				      	@csrf
				      <div class="modal-body">

							  <div class="form-row">
							    <div class="form-group col-md-6">
							    	<select class="form-control dynamic" name="cat_id" id="cat_id" >
							    		<option value="">--Select Category--</option>
							    		@foreach($categories as $category)
							    		<option value = "{{$category->id}}">{{$category->category}}</option>
							    		@endforeach
							    	</select>
							    								      
							    </div>
							    <div class="form-group col-md-6">
							      <select class="form-control" id="product" name="product">
							      	<option value="">--Select Product--</option>
							      								      	
							      </select>
							    </div>
							   {{csrf_field()}}
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <input type="text" name="vendor" class="form-control" placeholder="Vendor">
							    </div>
							    <div class="form-group col-md-6">
							      <input type="number" name="quantity" class="form-control" placeholder="chalan quantity">
							    </div>
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <input type="text" name="buy_price" class="form-control" placeholder="buying price">
							    </div>
							    <div class="form-group col-md-6">
							      <input type="text" name="sell_price" class="form-control" placeholder="selling price">
							    </div>
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-6 datepicker" >
							      <input type="text" name="chalan_date" data-provide="datepicker" class="form-control" placeholder="Chalan Date">
							    </div>

							    <div class="form-group col-md-6">
							      <input type="text" name="note" class="form-control" placeholder="Notes">
							    </div>
							  </div>
							  

					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Save</button>
					      </div>
					   </form>
				    </div>
				  </div>
				</div>
			</h1>

		</div>
	
		<div class="wrap">
			<div class="body" style="margin-left: 10px;">
				<table class="table" id="datatable">
				  <thead>
				    <tr>
				      <th scope="col">#</th>
				      <th scope="col">Category</th>
				      <th scope="col">Name</th>
				      <th scope="col">Vendor</th>
				      <th scope="col">Chalan</th>
				      <th scope="col">Quantity</th>
				      <th scope="col">Current Quantity</th>
				      <th scope="col">Batying Price</th>
				      <th scope="col">Selling Price</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1;?>
				  	@foreach($stocks as $stock)
				    <tr>
				      <th scope="row">{{$i}}</th>
				      <td>{{$stock->category}}</td>
				      <td>{{$stock->product_name}}</td>
				      <td>{{$stock->vendor}}</td>
				      <td>{{$stock->chalan_date}}</td>
				      <td>{{$stock->quantity}}</td>
				      <td>{{$stock->current_quantity}}</td>
				      <td>{{$stock->buy_price}}</td>
				      <td>{{$stock->sell_price}}</td>
				      <td>
				      	<a href="{{route('vendor.edit',$stock->id)}}" class="primary" ><i class="fa fa-edit"></i></a> || <a href="" class="primary"><i class="fa fa-trash"></i></a>
				      </td>
				    </tr>
				    @endforeach
				    <?php $i++;?>				    				    
				  </tbody>
				</table>
			</div>
		</div>
	</div>

</div>



@endsection


