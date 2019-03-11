@extends('template')
@section('content')
    {{-- <script>
      if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
      }
  </script> --}}

  <section style="margin-top:100px;">
    <div class="container">
      <h5>BOOKING SNORKELING</h5>
      <h6 style="color: #007bff;">
        @foreach ($all_perjalanan as $key => $perjalanan)
          @foreach ($destinasi as $key => $value)
            @if ($perjalanan->id_destinasi == $value->id_destinasi)
              {{$value->nama, $value->alamat}}
            @endif
          @endforeach
        @endforeach
      </h6>
      <h6>{{$departure}}</h6>
      <br>
      <form id="form-snorkeling" action="{{route('process-book-snorkeling')}}" method="post">
        {{csrf_field()}}
        <input type="text" style="display: none;" name="person" id="person" value="{{$person}}">
        <input type="text" style="display: none;" name="departure" id="departure" value="{{$departure}}">
        <input type="text" style="display: none;" name="id_perjalanan_snorkeling" id="id_perjalanan_snorkeling" value="{{$perjalanan->id_perjalanan_snorkeling}}">
        <input type="text" style="display: none;" name="id_destinasi" id="id_destinasi" value="{{$perjalanan->id_destinasi}}">

        {{-- form Order detail --}}
        <div class="form-horizontal">
          <h3 style="color: #007bff;">Order Details</h3>
          <hr>
            <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-2">
                    <label for="name_order">Name</label>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="name_order" name="name_order" placeholder="Name" type="text" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2">
                  <label for="no_telp_order">Telephone</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" id="no_telp_order" name="no_telp_order" placeholder="Telephone Number" type="number" pattern="{0-9}" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2">
                  <label for="email_order">Email</label>
                </div>
                <div class="col-md-8">
                  <input type="email" class="form-control" id="email_order" name="email_order" placeholder="Email">
                </div>
              </div>
            </div>
        </div>
        {{-- endform-horizontal --}}
        <br>

      @for ($i=0; $i < $person; $i++)
        <div class="form-horizontal">
          <h3 style="color: #007bff;">Passenger {{$i+1}}</h3>
          <hr>
            <div class="form-group">
              <label for="email{{$i+1}}">Name</label>
              <input type="text" class="form-control" id="name{{$i+1}}" name="name{{$i+1}}" placeholder="Name">
            </div>

            <div class="form-group">
              <label for="id_number{{$i+1}}">ID Number</label>
              <input type="number" class="form-control" id="id_number{{$i+1}}" name="id_number{{$i+1}}" placeholder="ID Number">
          </div>
            <div class="form-group">
              <label for="no_telp{{$i+1}}">Telephone</label>
              <input type="number" class="form-control" id="no_telp{{$i+1}}" name="no_telp{{$i+1}}" placeholder="Telephone Number">
            </div>
          </div>
            <br>
      @endfor
      <button type="submit" class="btn btn-primary">GO TO PAYMENT</button>
    </form>

    </div>
  </section>
</script>
@endsection
