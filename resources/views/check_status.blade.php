@extends('template')
@section('content')
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

<section id="" class="status-sec" style="margin-top: 100px">
  <div class="container">
    <form action="{{route('check_status')}}" method="post" class="form">

    <div class="form-horizontal">
      <h3 style="color: #007bff;">Check Your Transaction Status</h3>
      <hr>
        <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
          <div class="form-group">
            <div class="row">
              <div class="col-md-6">
                <label for="no_trs">Please enter your transaction number below : </label>
                <input class="form-control" id="no_trs" name="no_trs" placeholder="Transaction Number" type="text" required>
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
