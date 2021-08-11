
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
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
 
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#"><i
            class="fa fa-th-large"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/')}}" class="brand-link">
       <img src="{{asset('images/shopping-logo.png')}}" alt="Company Logo" class="brand-image img-circle elevation-3" > 
      <span class="brand-text font-weight-light">Super Shop</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="/images/default.png" class="img-circle" alt="User Image">
        </div>
        <div class="info">
          <a class="d-block">{{Auth::user()->name}}</a>
          <!-- Status -->
          
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{route('home')}}" class="nav-link active">
            <i class="fa fa-tachometer"></i> 
            <span>Dashboard</span></a>
        </li>
        <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
                <i class="fa fa-shopping-basket"></i>
                <p>
                  Product Manage
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('vendor.view')}}" class="nav-link">
                    <i class="fa fa-address-book"></i> 
                    <span>Vendor</span>
                  </a>
                </li>              
                <li class="nav-item">
                  <a href="{{route('product.category')}}" class="nav-link">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Product Category</span>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="{{route('product.view')}}" class="nav-link">
                    <i class="fa fa-shopping-bag"></i>
                    <span>Product</span>
                  </a>
                </li>        
              </ul>
          </li>
          <li class="nav-item has-treeview ">
              <a href="#" class="nav-link">
                <i class="fa fa-eye"></i>
                <p>
                  Stock Management
                  <i class="right fa fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="{{route('stock.view')}}" class="nav-link">
                    <i class="fa fa-archive"></i> 
                    <span>Stock In</span>
                  </a>
                </li>              
                <li class="nav-item">
                  <a href="{{route('invoice.view')}}" class="nav-link">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Stock Out/Invoice</span>
                  </a>
                </li>
              </ul>
          </li>
        <li class="nav-item">
          <a href="" class="nav-link">
            <i class="fa fa-line-chart"></i> 
            <span>Report</span></a>
        </li>
        <li class="nav-item">
         <a href="{{ route('logout') }}" class="nav-link"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
           <i class="fa fa-power-off text-red"></i>   <span>Logout</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content container-fluid">
        @yield('content')
    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="#">Super Shop</a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->


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



