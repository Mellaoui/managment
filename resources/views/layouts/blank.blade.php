<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  
  <title>Team Dashboard</title>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
  
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/css/app.css">
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.es.min.js"></script>  <link rel="stylesheet" href="/icofont/icofont.min.css">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper" id="app">
  @if (session('status'))
  {{ session('status') }}
  @endif
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
  
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
      </li>
    
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
      <div class="input-group input-group-sm">
        <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
        <div class="input-group-append">
          <button class="btn btn-navbar" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Right navbar links -->
 
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-light elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="img/MoG.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Viral | group</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="img/user.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <router-link to="/profile" class="d-block"><strong> {{ Auth::user()->name }} </strong></router-link>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
             <li class="nav-item"> 
               <router-link to="/home"  class="nav-link ">
              <span class="nav-icon fa fa-dashboard blue"></span>
              <p class="link-text">
                <strong>
                Dashboard
                </strong>
              </p>
            </router-link>
            </li>

            @can('isAdmin')
            <li class="nav-item"> 
              <router-link to="/new_user"  class="nav-link ">
             <span class="nav-icon icofont-contact-add blue"></span>
             <p class="link-text">
               <strong>
               Add User
               </strong>
             </p>
           </router-link>
           </li>
           

            <li class="nav-item">
              <router-link to="/tables"  class="nav-link ">
                <i class="nav-icon icofont-table blue"></i>         
                <p>
                  <strong>
                  Add Employee 
                  </strong>
                </p>      
              </router-link> 
            </li>
          
           
            <li class="nav-item">
              <router-link to="/developer"  class="nav-link ">
               <i class="nav-icon fa fa-cogs blue"></i>         
                <p>
                  <strong>
                   Developer
                  </strong>
                </p>      
              </router-link> 
            </li>

            <li class="nav-item">
              <router-link to="/list"  class="nav-link ">
               <i class="icofont-listing-number blue"></i>         
                <p>
                  <strong>
                     Employee List
                  </strong>    
                </p>      
              </router-link> 
            </li>
            @endcan
            <li class="nav-item">
              <router-link to="/attandence"  class="nav-link ">
               <i class="icofont-clock-time blue"></i>       
                <p>
                  <strong>
                     View attandence 
                  </strong>  
                </p>      
              </router-link> 
            </li>
         

          <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
              <i class="nav-icon fa fa-power-off"></i>
              <p>
                <strong>
                  Logout
                </strong>
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
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
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">

      <router-view></router-view>

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->      
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
      
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2020 <a href="#"></a>.</strong> All rights reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="/js/app.js" ></script>
</body>
</html>