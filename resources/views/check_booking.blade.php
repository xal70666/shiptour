@extends('template')
@section('content')
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<section id="services" style="margin-top: 100px">
  <div class="container">
    <form action="{{route('check_booking')}}" method="post" class="form">

    <div class="form-horizontal">
      <h3 style="color: #007bff;">Check Your Boooking Code</h3>
      <hr>
        <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="kd_book">Please enter your code booking below : </label>
                <input class="form-control" id="kd_book" name="kd_book" placeholder="Booking Code" type="text" required>
              </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary btn-sm btn-flat">CHECK</button>
      </form>
    </div>
  </div>
</section>

@include('contact')
@include('footer')

@endsection
