
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Datepicker - Display inline</title>
  {{-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> --}}

  <link href="{{ asset('css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
  <link href="{{ asset('css/jquery-ui.css')}}" rel="stylesheet">

  <script src="{{ asset('js/jquery.js')}}"></script>
  <script src="{{ asset('js/jquery-ui.min.js')}}"></script>

</head>
<body>

<form class="" action="index.html" method="post">
  <input type="text" name="" id="datepicker" value="">
</form>
<script>
$( function() {
  $( "#datepicker" ).datepicker();
} );
</script>
</body>
</html>
