<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>CCC EMS</title>

    <!-- Bootstrap -->
     <link href="{{ URL::asset('themes/gentelella-master/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('themes/gentelella-master/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
     <!-- Animate.css -->
    <link href="https://colorlib.com/polygon/gentelella/css/animate.min.css" rel="stylesheet">
      <!-- Custom Theme Style -->
    <link href="{{ URL::asset('themes/gentelella-master/build/css/custom.css') }}" rel="stylesheet">
    
    <style type="text/css">
    
    h1::before{
        content: none;
    }    

    </style>

  </head>

  <body class="login">
   @yield('content')
    
  </body>
</html>