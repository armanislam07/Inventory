@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="block-header">
		<h2>Product List</h2>
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
				        <h5 class="modal-title" id="exampleModalScrollableTitle">Product</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form action="{{route('product.save')}}" method="POST">
				      	@csrf
				      <div class="modal-body">

							  <div class="form-row">
							    <div class="form-group col-md-12">
							    	<select class="form-control" name="cat_id">
							    		<option default>--Select Category--</option>
							    		@foreach($categories as $category)							    		
							    		<option value = "{{$category->id}}">{{$category->category}}</option>
							    		@endforeach
							    	</select>
							    	
							      <!-- <input type="text" name="product_category" class="form-control" placeholder="Product Category"> -->
							      
							    </div>
							    <div class="form-group col-md-12">
							      <input type="text" name="product_name" class="form-control" placeholder="Product Name">
							    </div>
							  </div>
							  <div class="form-row">
							    <div class="form-group col-md-12">
							      <input type="text" name="product_code" class="form-control" placeholder="Product Code">
							    </div>
							    <div class="form-group col-md-12">
							      <input type="text" name="product_note" class="form-control" placeholder="Product Note">
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
				      <th scope="col">Name</th>
				      <th scope="col">Code</th>
				      <th scope="col">Details</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1;?>
				  	@foreach($products as $product)
				    <tr>
				      <th scope="row">{{$i}}</th>
				      <!-- <td id="name">{{$product->product_category}}</td> -->
				      <td id="name">{{$product->product_name}}</td>
				      <td id="code">{{$product->product_code}}</td>
				      <td>{{$product->product_note}}</td>
				      <td>
				      	<a href="{{route('vendor.edit',$product->id)}}" class="primary" ><i class="fa fa-edit"></i></a> || <a href="" class="primary"><i class="fa fa-trash"></i></a>
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

<script type="text/javascript">
  $(document).ready(function(){
    var table = $('#datatable').DataTable();
    // start edit record
    table.on('click','.permission',function(){
      $tr = $(this).closest('tr');
      if($($tr).hasClass('child')){
        $tr = $tr.prev('.parent');
      }
      var data = table.row($tr).data();
      console.log(data);

      $('#name').val(data[1]);
      
      $('#code').val(data[2]);
      // $('#to_name').val(data[4]);
      // $('#amount').val(data[5]);
      // $('#excamount').val(data[6]);

      $('#editform').attr('action','/account/' + data[0]);
      $('#acceptleModal').modal('show');
    });
  });

</script>

@endsection