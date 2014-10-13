<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My App</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="/lib/bootstrap-3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/lib/font-awesome-4.2.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="/css/style.css">
    <script src="/lib/jquery-2.1.1.min.js"></script>
    
    

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
          <li><!-- Button trigger modal -->
            <a href="#" data-toggle="modal" data-target="#myModal">
              Log In
            </a>
          </li>
          
        </ul>
        <h3 class="text-muted"><img src="/images/logo.png" style="width:50px"/></h3>
      </div>

      @yield('content')

      <div class="footer">
        <p>&copy; Company 2014</p>
      </div>

    </div> <!-- /container -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title" id="myModalLabel">Log in or Sign Up</h4>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
              </div>
              <div class="col-md-6">
                {{
                  Former::horizontal_open()
                  ->id('create_account')
                  ->secure()
                  ->rules([
                    'username' => 'required',
                    'first_name' => 'required',
                    'last_name' => 'required',
                    'password' => 'required',
                    'password_confirm' => 'required',
                    ])
                  ->method('GET')
                }}
                {{
                  Former::xlarge_text('username')
                  ->label('')
                  ->placeholder('Username')
                  ->required();
                }}
                {{
                  Former::xlarge_text('first_name')
                  ->label('')
                  ->placeholder('First Name')
                  ->required();
                }}
                {{
                  Former::xlarge_text('last_name')
                  ->label('')
                  ->placeholder('Last Name')
                  ->required();
                }}
                {{
                  Former::xlarge_text('password')
                  ->label('')
                  ->placeholder('Password')
                  ->required();
                }}
                {{
                  Former::xlarge_text('password_confirm')
                  ->label('')
                  ->placeholder('Confirm Password')
                  ->required();
                }}
                {{
                Former::actions()
                  ->label('')
                  ->large_primary_submit('Submit')
                }}
                {{
                  Former::close()
                }}
              </div>
            </div>
          </div>
          <script>
          $(function() {
            $('#create_account').ajaxForm(function() { 
              alert("Thank you for your comment!"); 
            }); 
          });
          </script>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
    
    <script src="/lib/bootstrap-3.2.0/js/bootstrap.min.js"></script>
    <script src="/lib/jquery.form-3.51.0.js"></script>

    @yield('footer')
  </body>
</html>
