<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="/css/app.css">
 
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Ionicons -->

  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
    .login-page{
      background: linear-gradient(to bottom, #eb5757, #000000); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    }
    .login-box{
      margin-top: 0%;
     }
    .circle-image{

       width: 60%;
       height: 200px;
       text-align: center;
       display: block;
       margin-left: auto;
       margin-right: auto; 
       margin-bottom: 2px;
       padding-top: auto !important;
}
     
  </style>
</head>
<body class="hold-transition login-page">
  
<div class="login-box">
  <div class="login-logo">
    <a href="index3.html" class="brand-link">
      <img src="img/MoG.png" alt="AdminLTE Logo" class="card-img-top rounded-circle circle-image" data-holder-rendered="true">
      <span class="brand-text font-weight-light"></span>
    </a>
  </div>
  <!-- /.login-logo -->
  
  <div class="card">

      @yield('content')
      
  
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
</html>
