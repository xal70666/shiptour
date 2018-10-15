<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JT-Indonesia.com</title>

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

    <link href="{{ asset('css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-datepicker3.min.css')}}" rel="stylesheet">
    <style type="text/css">
   .ui-datepicker {
      background: #333;
      border: 1px solid #555;
      color: #EEE;
    }
    .ui-icon-circle-triangle-w { background-position: -80px -192px; background-color: #007bff;}
    .ui-icon-circle-triangle-e { background-position: -80px -192px; background-color: #007bff;}

   </style>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">JT-Indonesia.com</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

@yield('content')





    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{ asset('js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js')}}"></script>

    <!-- Plugin JavaScript -->
    <script src="{{ asset('js/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Contact form JavaScript -->
    <script src="{{ asset('js/agency/jqBootstrapValidation.js')}}"></script>
    <script src="{{ asset('js/agency/contact_me.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/agency/agency.min.js')}}"></script>
    <script src="{{ asset('js/agency/jsAgency.js')}}"></script>
    <script src='{{ asset("js/drop.js") }}'></script>

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
