<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My App</title>

    <script src="/lib/jquery-2.1.1.min.js"></script>
    <link rel="stylesheet" href="/css/style.css">
    
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/lib/bootstrap-3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/font-awesome-4.2.0/css/font-awesome.min.css">
    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="/lib/aFarkas-html5shiv-3.7.2/dist/html5shiv.min.js"></script>
      <script src="/lib/Respond-1.4.2/dest/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
        <h3 class="text-muted"><img src="/images/logo.png" style="width:50px"/></h3>
      </div>

      @yield('content')

      <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->

    
    <script src="/lib/bootstrap-3.2.0/js/bootstrap.min.js"></script>
    @yield('footer')
  </body>
</html>
