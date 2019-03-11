@extends('template')
@section('content')
  <script>
    // if ( window.history.replaceState ) {
    //     window.history.replaceState( null, null, window.location.href );
    // }
</script>
  <style media="screen" type="text/css">
  .content {
    width: 600px;
}
  .pull-left {
  float: left!important;
}

.pull-right {
    float: right!important;
}

.sidebar {
  padding: 10px;
  border-radius: 15px;
  background-color: #ced4da;
  width: 455px;
}
.dotted {
  border: 1px dotted #000000;
  border-style: none none dotted;
  color: #fff;
  background-color: #fff;
}


/*  */
@media only screen and (max-width: 768px) {
  .sidebar {
    width: 100%;
    margin-top: -110px;
    margin-left: auto;
    margin-bottom: 20px;
  }

}
  </style>
  @php
  $harga_dewasa = 0;
  $harga_anak = 0;
@endphp
  <section id="services" style="margin-top: 100px">
    <div class="container">
    <div class="pull-right sidebar" >
      <h6 style="color: #007bff;">Price Detail</h6>
      <hr>
      <div class="price-info">
        <p><b>Departure :</b></p>
        <p class="">
          @foreach ($kapal as $key => $value)
            @if ($value->id_kapal == $id_kapal)
              {{$value->nama_kapal}} ({{$from->nama}} - {{$to->nama}})</p>
            @endif
          @endforeach
          <div class="row">
            <div class="col-md-6">
              <p>Adult x{{$dewasa}}</p>
            </div>
            <div class="col-md-6 price-dtl">
              @foreach ($data_perjalanan as $key => $value)
                @php
                  $harga_dewasa = $value->harga_dewasa;
                @endphp
                IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}
              @endforeach
            </div>
          </div>
          {{-- @if ($anak != 0)
            <div class="row">
              <div class="col-md-6">
                <p>Child x{{$anak}}</p>
              </div>
              <div class="col-md-6">
                @foreach ($data_perjalanan as $key => $value)
                  @php
                    $harga_anak = $value->harga_anak;
                  @endphp
                  IDR {{ number_format($value->harga_anak, 2, ',', '.')}}
                @endforeach
              </div>
            </div>
          @endif --}}

          <hr class='dotted' />
          <div class="row">
            <div class="col-md-6">
              <p>Discount</p>
            </div>
            <div class="col-md-6">
              IDR {{0}}
            </div>
          </div>
          <hr class='dotted' />
          <div class="row">
            <div class="col-md-6">
              <p>Total Payment</p>
            </div>
            <div class="col-md-6">
              @php
                // $total_harga = ((int)$dewasa * $harga_dewasa) + ((int)$anak * $harga_anak);
                $total_harga = ((int)$dewasa * $harga_dewasa);
              @endphp
              IDR {{number_format($total_harga, 2, ',', '.')}}
            </div>
          </div>
      </div>
    </div>

  <div class="pull-left main">
  <form action="{{route('payment')}}" method="post" class="form">

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
              <div class="col-sm-2">
                <select class="form-control" name="title_order" id="title_order" required>
                  <option value="0" selected>Mr.</option>
                  <option value="1">Mrs.</option>
                </select>
              </div>
              <div class="col-md-6">
                @if (Auth::user())
                  <input class="form-control" id="name_order" name="name_order" placeholder="Name" type="text" value="{{Auth::user()->name}}">
                @else
                  <input class="form-control" id="name_order" name="name_order" placeholder="Name" type="text" required>
                @endif
              </div>
            </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-2">
              <label for="no_telp_order">Telephone</label>
            </div>
            <div class="col-md-8">
              <input class="form-control" id="no_telp_order" name="no_telp_order" placeholder="Telephone Number" type="text" pattern="{0-9}" required>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="row">
            <div class="col-sm-2">
              <label for="email_order">Email</label>
            </div>
            <div class="col-md-8">
              @if (Auth::user())
                <input type="email_order" class="form-control" id="email_order" name="email_order" placeholder="Email" value="{{Auth::user()->email}}">
              @else
                <input type="email_order" class="form-control" id="email_order" name="email_order" placeholder="Email" required>
              @endif
            </div>
          </div>
        </div>
    </div>
    {{-- endform-horizontal --}}


    <div class="form-horizontal pass-sec" style="margin-top: 100px;">
      <h3 style="color: #007bff;">Passenger Details</h3>
      <hr>
      @for ($i=0; $i < $total_penumpang; $i++)
        {{-- form Passenger detail --}}
        <div class="panel panel-info" {{ $i === 0? 'style=margin-top:0px;' : 'style=margin-top:80px;' }}>
          <div class="panel-heading"><span class="label label-default" style="color: #fec810;"><b>Passenger {{$i+1}}</b></span></div>
          <div class="panel-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-2">
                    <label for="name{{$i+1}}">Name</label>
                  </div>
                  <div class="col-sm-2">
                    <select class="form-control" name="title{{$i+1}}" id="title{{$i+1}}" required>
                      <option value="0" selected>Mr.</option>
                      <option value="1">Mrs.</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <input class="form-control" id="name{{$i+1}}" name="name{{$i+1}}" placeholder="Name" type="text" required>
                  </div>
                </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2">
                  <label for="no_telp{{$i+1}}">Telephone</label>
                </div>
                <div class="col-md-8">
                  <input class="form-control" id="no_telp{{$i+1}}" name="no_telp{{$i+1}}" placeholder="Telephone Number" type="number" required>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-sm-2">
                  <label for="no_id{{$i+1}}">ID Number</label>
                </div>
                <div class="col-md-8">
                  <input type="number" class="form-control" id="no_id{{$i+1}}" name="no_id{{$i+1}}" placeholder="ID Number" required>
                  <span class="help-block"><small>ID number is filled in according to KTP / Passport / SIM</small></span>
                </div>
              </div>
            </div>
            <span class="help-block"><small>Name & ID Number must be in accordance with KTP / Passport / SIM (without punctuation and degree)</small></span>
          </div>
        </div>
        <hr>
      @endfor

      <input type="text" name="tgl_berangkat" value="{{$tgl_berangkat}}" style="display: none;">
      @if (Auth::user())
        <input type="text" name="id_pemesan" value="{{Auth::user()->id}}" style="display: none;">
      @else
        <input type="text" name="id_pemesan" value="0" style="display: none;">
      @endif
      <input type="text" name="departure" value="{{$departure}}" style="display: none;">
      <input type="text" name="total_penumpang" value="{{$total_penumpang}}" style="display: none;">
      <input type="text" name="from" value="{{$from}}" style="display: none;">
      <input type="text" name="to" value="{{$to}}" style="display: none;">
      <input type="text" name="id_kapal" value="{{$id_kapal}}" style="display: none;">
      <input type="text" name="id_perjalanan" value="{{$id_perjalanan}}" style="display: none;">
      <input type="text" name="dewasa" value="{{$dewasa}}" style="display: none;">
      {{-- <input type="text" name="anak" value="{{$anak}}" style="display: none;"> --}}
      <input type="text" name="id_asal" value="{{$id_asal}}" style="display: none;">
      <input type="text" name="id_tujuan" value="{{$id_tujuan}}" style="display: none;">
      <button type="submit" class="btn btn-primary btn-sm btn-flat">Go to payment</button>
    </form>
    </div>
    {{-- endform-horizontal --}}
    </div>


    </div>
    {{-- end container --}}
  </section>

  @include('contact')
@endsection
