@extends('layouts.master')

@section('content')
	<!-- Edit vendor -->
	
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Vendor</h5>
	        <a href="{{route('vendor.view')}}" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </a>
	      </div>
	      <form action="{{route('vendor.update',$vendor->id)}}" method="POST">
	      	@csrf
	      <div class="modal-body">
	      		
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <input type="text" name="vendor_name" value="{{$vendor->vendorName}}" class="form-control" placeholder="Name">
				    </div>
				    <div class="form-group col-md-6">
				      <input type="text" name="vendor_company" value="{{$vendor->vendorCompany}}" class="form-control" placeholder="Company">
				    </div>
				  </div>
				  <div class="form-row">
				    <div class="form-group col-md-6">
				      <input type="email" name="vendor_email" value="{{$vendor->vendorEmail}}" class="form-control" placeholder="Email">
				    </div>
				    <div class="form-group col-md-6">
				      <input type="number" name="vendor_mobile" value="{{$vendor->vendorPhone}}" class="form-control" placeholder="Mobile">
				    </div>
				  </div>
				
		      </div>
		      <div class="modal-footer">
		        <a href="{{route('vendor.view')}}" type="button" class="btn btn-secondary" data-dismiss="modal">Close</a>
		        <button type="submit" class="btn btn-primary">Save changes</button>
		      </div>
		   </form>
	    </div>
	  
	<!-- End edit vendor -->
@endsection