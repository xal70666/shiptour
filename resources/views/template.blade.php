<!DOCTYPE html>
<html lang="en">

  <head>

    {{-- <meta charset="utf-8"> --}}
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    {{-- <meta name="csrf-token" content="{{ csrf_token() }}"> --}}

    <title>Tiket Fast Boat Ke Lombok atau Bali | jtindonesia.com</title>
    <link rel="icon" href="{{ asset('images/icon.ico')}}">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/agency/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <link href="{{ asset('css/Font-Droid-Serif-400-700-400italic-700italic.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/Font-Kaushan-Script.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/Font-Montserrat400-700.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/Font-Roboto-Slab-400-100-300-700.css')}}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/agency/agency.min.css')}}" rel="stylesheet">

    {{-- carousel --}}
    <link href="{{ asset('css/agency/style.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/jquery.jgrowl.min.js')}}"></script>

    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="/css/sweetalert2.min.min.css">
    <link href="{{ asset('css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <style type="text/css">
   .ui-datepicker {
      background: #333;
      border: 1px solid #555;
      color: #EEE;
    }
    .ui-icon-circle-triangle-w { background-position: -80px -192px; background-color: #007bff;}
    .ui-icon-circle-triangle-e { background-position: -80px -192px; background-color: #007bff;}

    #email {
        width: 280%;
      }
    #password {
      width: 280%;
    }

    @media (max-width: 767px) {
  .navbar-nav .show .dropdown-menu {
    position: static;
    float: none;
    width: auto;
    margin-top: 0;
    background-color: transparent;
    border: 0;
    box-shadow: none;
  }

  #email {
    width: 100%;
  }

  #password {
    width: 100%;

  }

  #lb_email {
    color: #007bff;
  }

  #lb_password{
    color: #007bff;

  }

  #remember{
    color: #007bff;

  }

}

  .

   </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">JTIndonesia.com</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="{{route('home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#services">Facilities</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/#portfolio">Destination</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li> --}}
            <li class="nav-item">
              <div class="dropdown show">

                <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded=false>
                      Checking <i class="icon-chevron-down"></i>
                    </a>
                  <ul class="dropdown-menu">
                    <li class="dropdown-item">
                      <a class="nav-link js-scroll-trigger dropdown-item" href="{{route('check_status')}}">Check Order</a>
                    </li>
                    <li class="dropdown-item">
                      <a class="nav-link js-scroll-trigger dropdown-item" href="{{route('check_booking')}}">Booking Code</a>
                    </li>
                  </ul>


              </div>
            </li>

            @if (Auth::user())

              <li class="nav-item">
                <div class="dropdown show">

                  <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded=false>
                      Hi, {{Auth::user()->name}}

                        <i class="icon-chevron-down"></i>
                      </a>
                    <ul class="dropdown-menu">
                      <li clas="dropdown-item">
                        <a class="nav-link js-scroll-trigger dropdown-item" href="{{route('user.order')}}">My Order</a>
                      </li>
                      <li class="dropdown-item">
                        <a class="nav-link js-scroll-trigger dropdown-item" href="{{route('user.logout')}}">Logout</a>
                      </li>
                    </ul>


                </div>
              </li>
            @else
              <li class="nav-item">
                <div class="dropdown show">

                  <a href="javascript:;" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded=false>
                      Login

                        <i class="icon-chevron-down"></i>
                      </a>
                    <ul class="dropdown-menu login-panel">
                      <li class="dropdown-item">
                        {{-- <a class="nav-link js-scroll-trigger" href="{{route('login')}}">Login</a> --}}
                        <div class="panel panel-default">

                            <div class="panel-body">
                                <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" id="lb_email" class="col-md-4 control-label">E-Mail Address</label>

                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label id="lb_password" for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label id="remember">
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-md-8 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                LOGIN
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <div class="panel-footer">
                                <div class="col-md-8 col-md-offset-4">
                                    <a class="btn btn-primary" href="{{route('register')}}">
                                    REGISTER
                                    </a>
                                </div>
                                
                                </div>
                            </div>
                        </div>
                      </li>
                      {{-- <li class="dropdown-item">
                        <a class="nav-link js-scroll-trigger dropdown-item" href="{{route('register')}}">Register</a>
                      </li> --}}
                    </ul>


                </div>
              </li>
            @endif

          </ul>
        </div>
      </div>
    </nav>

@yield('content')
@yield('footer')


    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/popper.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{ asset('js/agency/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('js/agency/contact_me.js')}}"></script>
    <script src="{{ asset('js/sweetalert.min.js')}}"></script>
    @include('sweet::alert')

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/agency/agency.min.js')}}"></script>
    <script src="{{ asset('js/agency/jsAgency.js')}}"></script>
    <script src='{{ asset("js/drop.js") }}'></script>
    <script src='{{ asset("js/sortDate.js") }}'></script>


    <script type="text/javascript">
    $( "#datepicker-departure" ).datepicker({
      dateFormat: "yy-mm-dd",
      minDate: 0,
      weekStart: 0,
      calendarWeeks: true,
      autoclose: true,
      todayHighlight: true,
      rtl: true,
      orientation: "auto"
    });

    $( "#datepicker-arrival" ).datepicker({
      dateFormat: "mm/dd/yy",
      weekStart: 0,
      calendarWeeks: true,
      autoclose: true,
      todayHighlight: true,
      rtl: true,
      orientation: "auto"
    });

    function jikaPP() {
        var checkBox = document.getElementById("pp");
        var arr = document.getElementById("arrival");
        if (checkBox.checked == true){
            arr.style.display = "block";
        } else {
           arr.style.display = "none";
        }

    }


    </script>

  </body>

</html>
