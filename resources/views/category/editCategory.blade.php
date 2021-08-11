@extends('layouts.master')

@section('content')
	<!-- Edit vendor -->
	
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Vendor</h5>
	        <a href="{{route('product.category')}}" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </a>
	      </div>
	      <form action="{{route('product.category.update',$category->id)}}" method="POST">
	      	@csrf
	      <div class="modal-body">
	      		
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <input type="text" name="category_name" value="{{$category->category}}" class="form-control" placeholder="Name">
				    </div>
				    
				  </div>
				
		      </div>
		      <div class="modal-footer">
		        <a href="{{route('product.category')}}" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		   </form>
	    </div>
	  
	<!-- End edit vendor -->
@endsection