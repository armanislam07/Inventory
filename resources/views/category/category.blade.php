@extends('layouts.master')

@section('content')
<div class="container-fluid">
	<div class="block-header">
		<h2>Category List</h2>
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
				        <h5 class="modal-title" id="exampleModalScrollableTitle">Category</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <form action="{{route('product.category.save')}}" method="POST">
				      	@csrf
				      <div class="modal-body">

							  <div class="form-row">
							    <div class="form-group col-md-6">
							      <input type="text" name="category" class="form-control" placeholder="Name">
							    </div>
							    
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					        <button type="submit" class="btn btn-primary">Save changes</button>
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
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php $i = 1;?>
				  	@foreach($categories as $category)
				    <tr>
				      <th scope="row">{{$i}}</th>
				      <td id="name">{{$category->category}}</td>     
				      <td>
				      	<a href="{{route('product.category.edit',$category->id)}}" class="primary" ><i class="fa fa-edit"></i></a> || <a href="" class="primary"><i class="fa fa-trash"></i></a>
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
      
      // $('#from_name').val(data[3]);
      // $('#to_name').val(data[4]);
      // $('#amount').val(data[5]);
      // $('#excamount').val(data[6]);

      $('#editform').attr('action','/account/' + data[0]);
      $('#acceptleModal').modal('show');
    });
  });

</script>

@endsection