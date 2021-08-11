<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Super Shop | Starter</title>
   <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"> 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"> 

  <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  

  <!-- <link rel="stylesheet" href="{{ asset('css/app.css')}}"> -->

</head>
<body class="margin-25">

	<div class="container">		
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-6">
						<img src="{{asset('images/shopping-logo.png')}}" alt="Company Logo" class="logo-size" > 
						<span class="h2">your company name</span>
					</div>
					<div class="col-md-6 text-right">
						<div class="">
							<span class="text-bold text-size-40 ">INVOICE</span><br/>
							<span class="small text-bold">Your Company Name</span><br/>
							<span class="small">Address</span><br/>
							<span class="small">Phone:,</span><br/>
							<span class="small">E-mail:</span>
						</div>
					</div>
				</div>
			</div>
			<hr>		
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<span class="text-bold">Bill To:</span><br/>
					<span>name</span><br/>
					<span>Company name</span><br/>
					<span>Address</span><br/>
					<span>Phone</span><br/>
				</div>
				<div class="col-md-6">
					<table>
						<tr>
							<td class="text-right text-bold">Invoice No :</td>
							<td>&nbsp [Invoice No]</td>
						</tr>
						<tr>
							<td class="text-right text-bold">Date :</td>
							<td>&nbsp [Date]</td>
						</tr>
						<tr>
							<td class="text-right text-bold">Customer ID :</td>
							<td>&nbsp [Customer ID]</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<hr/>
		<div class="table-responsive ">
			<table class="table table-striped">
				<thead class="text-center">
					<tr class="table-primary ">
						<th style="width: 40px">#</th>
						<th style="width: 60%">Item Name</th>
						<th >Price</th>
						<th >QTY</th>
						<th >Sub Total</th>
					</tr>
				</thead>
				<tbody class="small">
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</tbody>
				<tfoot class="text-right table-borderless">
                    <tr>
                    	<td colspan="2">&nbsp;</td>
                        <td colspan="2">SUBTOTAL</td>
                        <td>$5,200.00</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">TAX 25%</td>
                        <td>$1,300.00</td>
                    </tr>
                    <tr>
                        <td colspan="2">&nbsp;</td>
                        <td colspan="2">GRAND TOTAL</td>
                        <td>$6,500.00</td>
                    </tr>
                </tfoot>
			</table>
		</div>
	</div>

<!-- REQUIRED SCRIPTS -->
<script src="{{asset('js/app.js')}}"></script>
<!-- <script src="{{asset('js/jquery.min.js')}}"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Bootstrap 4 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script> -->
<!-- AdminLTE App -->
<script src="{{asset('js/adminlte.min.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<!-- ajax -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</body>
</html>