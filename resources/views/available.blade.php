@extends('template')
@section('content')
  {{-- <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script> --}}

<style type="text/css">
  .sidebar {
    padding: 10px;
    border-radius: 15px;
    /* background-color: #ced4da; */
    width: 250px;
  }

  .avail{
    margin: auto;
    width: 100%;
    padding: 10px;
  }

  .title-search {
    margin-top: 10px;
    margin-left: 235px;
  }

  @media only screen and (max-width: 768px) {
    /* For mobile phones: */

    /* Form */
    #from {
      width: 100%;
      margin-left: -30px;
      /* margin-right: -10px; */

      margin-top: -40px;
      float: none;
      padding-left: 0px;
    }

    #to {
      /* padding: 0px; */
      width: 75%;
      margin-left: 110px;
      margin-right: -10px;
      margin-top: -29%;
      /* display: inline; */
      /* float: none; */
      /* padding-left: 0px; */
    }

    #datepicker-departure {
      width: 100%;
      margin-top: -30px;
      margin-left: -30px;;
      padding-left: -50px;
      margin-right: -35px;
    }

    #dewasa {
      margin-top: -30px;
      margin-left: -30px;
      margin-right: 10px;
    }

    #form-oneform {
      margin: 1em;
      border: 0px;
    }

    .form-oneform{
      border: 0px;
    }

    #search {
      margin-left: 180px;
      margin-top: -98px;
    }
    /*  */

    #availabe {
      margin-left: -120px;
      float: inherit;
      margin-bottom: -100px;
    }

    #available {
    }

    .oneform2 {
        height: 24%;
        width: 100%;
        padding: 30px;
        top: 90px;
    }

    .avail {
      margin: 130px;
      margin-top: 120px;
    }

    #list-avail, #judul-list-avail {
      width: 320px;
    }

    .title-search {
      margin-top: -20px;
      margin-left: -20px;
      margin-bottom: 50px;
    }

    .ttl-avail {
      width: 290px;
    }
}

</style>

  @php
    date_default_timezone_set('Asia/Jakarta');
    $jam = date("G:i:s");
    $tanggal = date("Y-m-d");
    $tgl_jam = date("Y-m-d H:i:s");
    // dd(date("Y-m-d H:i:s", strtotime($jam) + 43200) > date("Y-m-d H:i:s"));
    //

    $data[] = 0;

    foreach ($all_perjalanan as $key => $value) {
      foreach ($data_perjalanan as $key => $perjalanan) {
        if ($value->id_kapal == $perjalanan->id_kapal) {
          // var_dump($perjalanan->id_kapal);
          $data = array($data[0] + 1, $perjalanan->id_kapal);
        }
        else {
          $data2 = array($data[0] + 1, $perjalanan->id_kapal);
        }
      }
    }

  @endphp

<meta name="csrf-token" content="{{ csrf_token() }}">

<section id="availabe" style="margin-top: 5%">
  <div class="container" id="available">
    <div class="avail text-left" style="border: 2px;">
      <ul class="list-group" style="width: 100%;">
        <li class="list-group-item form-oneform">
          <form role="form" id="form-oneform" method="post" action="{{ route('available')}}">
            {{csrf_field()}}
            <div class="form-inline">
              <div class="form-group">
                <select id="from" name="from" class="form-control">
                  {{-- @foreach ($destinasi as $key => $value)
                  <option>{{$value->nama}}</option>
                @endforeach --}}
                <optgroup label="From">

                @foreach($destinasi as $value)
                  <option value="{{$value->id_destinasi}}" {{ $value->id_destinasi === $from->id_destinasi? 'selected' : '' }}>{{$value->nama}}</option>
                @endforeach
              </optgroup>

              </select>
              </div>
              <div class="form-group"  style="margin-right: 10px;">
                <select id="to" name="to" class="form-control">
                  <optgroup label="To">
                  @foreach($destinasi as $value)
                      <option value="{{$value->id_destinasi}}" {{ $value->id_destinasi === $to->id_destinasi? 'selected' : '' }}>{{$value->nama}}</option>
                  @endforeach
                </optgroup>
                </select>
              </div>

              <div class="form-group"  style="margin-right: 10px;">
                <input type="text" name="departure" id="datepicker-departure" value="{{$tgl_berangkat}}" class="form-control">
                @if ($errors->has('departure'))
                  <span class="help-block" style="color: #721c24;"> {{ $errors->first('departure') }}</span>
                @endif
              </div>

              <div class="form-group"  style="margin-right: 10px;">
                <select name="dewasa" id="dewasa" class="form-control">
                  <optgroup label="Person">
                  @for ($i=1; $i < 70; $i++)
                    <option value="{{$i}}" {{ $i == $dewasa ? 'selected' : '' }}>{{$i}}</option>
                  @endfor
                  </optgroup>
                </select>
              </div>

                {{-- <label for="anak">Anak</label>
                <select class="" name="anak">
                  @for ($i=0; $i < 125; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                  @endfor
                </select> --}}
              <div class="form-group">
                <button type="submit" id="search" class="btn btn-info">Search</button>
              </div>
            </div>
          </form>
        </li>
        <li class="list-group-item ttl-avail" style="background-color: #007bff; color:#fff">
            {{-- <div class="row" id="judul-list-avail"> --}}
            <img src="/images/icon-ship.ico" alt="" width="30px" height="30px"><b style="font-size: 20px;">Select Departure</b>
            <p>{{$from->nama}} - {{$to->nama}} | {{$departure}}, {{$dewasa}} Person </p>
            {{-- </div> --}}
        </li>
      <div class="row" id="list-avail">
      <div class="col-lg-12">
        {{-- <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
          <span class="sr-only"><i class="fa-li fa fa-spinner fa-spin"></i>45% Complete</span>
        </div> --}}
        <table class="" width="100%">
          {{-- cek jika data perjalanan ada --}}
          @if ($all_perjalanan->count() != 0)
            @if ($data_perjalanan->count() > 0)
              @php
                $i = 0;
              @endphp
              @foreach ($all_perjalanan as $key => $value)
                @if (date("Y-m-d H:i:s", strtotime($jam) + 43200) > date("Y-m-d H:i:s", strtotime("$tgl_berangkat $value->jam")))
                  <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                    <div class="row">
                      <div class="col-sm-2">
                        <img src="{{asset('/images/1.jpg')}}" alt="fastboot" width="150px">
                      </div>
                      <div class="col-lg-10">
                        <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                        <p><b>Departure Time : </b>{{date("H:i", strtotime($value->jam))}}</p>
                        <p><b>Estimated Arrived Time : </b>{{date("H:i", strtotime($value->jam) + (int)$value->durasi)}}</p>
                        <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>
                        <div class="alert alert-danger">Not Available</div>
                      </div>
                    </div>
                  </div>
                  <br>
                @else

                  @if ($value->id_kapal == $var[$i][1])
                    <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                      <div class="row">
                        <div class="col-sm-2">
                          <img src="{{asset('/images/1.jpg')}}" alt="fastboot" width="150px">
                        </div>
                        <div class="col-lg-10">
                          <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                          @if (($value->kapasitas - $var[$i][0]) - $total_penumpang < 0)
                            <p><b>Departure Time : </b>{{date("H:i", strtotime($perjalanan->jam))}}</p>
                            <p><b>Estimated Arrived Time : </b>{{date("H:i", strtotime($perjalanan->jam) + (int)$perjalanan->durasi)}}</p>
                            <p><b>Price : </b>IDR {{ number_format($perjalanan->harga_dewasa, 2, ',', '.')}}</p>
                            <div class="alert alert-danger">Sorry, seat is full.</div>
                          @else
                            <p><b>Available Capacity : </b>{{$value->kapasitas - $var[$i][1]}}</p>
                            <p><b>Departure Time : </b>{{date("H:i", strtotime($perjalanan->jam))}}</p>
                            <p><b>Estimated Arrived Time : </b>{{date("H:i", strtotime($perjalanan->jam) + (int)$perjalanan->durasi)}}</p>
                            <p><b>Price : </b>IDR {{ number_format($perjalanan->harga_dewasa, 2, ',', '.')}}</p>

                            {{-- form booking --}}
                            <form action="{{route('booking')}}" method="post">
                              <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
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
                              <input type="text" name="id_kapal" value="{{$value->id_kapal}}" style="display: none;">
                              <input type="text" name="id_perjalanan" value="{{$value->id_perjalanan}}" style="display: none;">
                              <input type="text" name="dewasa" value="{{$dewasa}}" style="display: none;">
                              {{-- <input type="text" name="anak" value="{{$anak}}" style="display: none;"> --}}
                              <input type="text" name="id_asal" value="{{$value->id_asal}}" style="display: none;">
                              <input type="text" name="id_tujuan" value="{{$value->id_tujuan}}" style="display: none;">
                              <button type="submit" class="btn btn-primary btn-sm btn-flat">BOOK NOW</button>
                            </form>
                          @endif
                        </div>
                      </div>
                    </div>

                  @endif {{-- endif compare id_kapal --}}
                @endif {{-- endif compare wkt perjalanan --}}

                @php
                  $i++;
                @endphp

              @endforeach {{-- foreach allperjalanan --}}

            @else {{-- else if tdk ada yang pesan sesuai rute (tampilkan semua kapasitas) --}}

              @php
                $i = 0;
              @endphp

              @foreach ($all_perjalanan as $key => $value)
                @if (date("Y-m-d H:i:s", strtotime($jam) + 43200) > date("Y-m-d H:i:s", strtotime("$tgl_berangkat $value->jam")))
                  <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                    <div class="row">
                      <div class="col-sm-2">
                        <img src="{{asset('/images/1.jpg')}}" alt="fastboot" width="150px">
                      </div>
                      <div class="col-lg-10">
                        <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                        <p><b>Departure Time : </b>{{date("H:i", strtotime($value->jam))}}</p>
                        <p><b>Estimated Arrived Time : </b>{{date("H:i", strtotime($value->jam) + (int)$value->durasi)}}</p>
                        <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>
                        <div class="alert alert-danger">Not Available</div>
                      </div>
                    </div>
                  </div>
                  <br>
                @else

                  @if ($value->id_kapal == $var[$i][1])
                    <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                      <div class="row">
                        <div class="col-sm-2">
                          <img src="{{asset('/images/1.jpg')}}" alt="fastboot" width="150px">
                        </div>
                        <div class="col-lg-10">
                          <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                          @if (($value->kapasitas - $var[$i][0]) - $total_penumpang < 0)
                            <p><b>Departure Time : </b>{{date("H:i", strtotime($value->jam))}}</p>
                            <p><b>Estimated Arrived Time : </b>{{date("H:i", strtotime($value->jam) + (int)$value->durasi)}}</p>
                            <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>
                            <div class="alert alert-danger">Sorry, seat is full.</div>
                          @else
                            <p><b>Available Capacity : </b>{{$value->kapasitas}}</p>
                            <p><b>Departure Time : </b>{{date("H:i", strtotime($value->jam))}}</p>
                            <p><b>Estimated Arrived Time : </b>{{date("H:i", strtotime($value->jam) + (int)$value->durasi)}}</p>
                            <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>

                            {{-- form booking --}}
                            <form action="{{route('booking')}}" method="post">
                              <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
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
                              <input type="text" name="id_kapal" value="{{$value->id_kapal}}" style="display: none;">
                              <input type="text" name="id_perjalanan" value="{{$value->id_perjalanan}}" style="display: none;">
                              <input type="text" name="dewasa" value="{{$dewasa}}" style="display: none;">
                              {{-- <input type="text" name="anak" value="{{$anak}}" style="display: none;"> --}}
                              <input type="text" name="id_asal" value="{{$value->id_asal}}" style="display: none;">
                              <input type="text" name="id_tujuan" value="{{$value->id_tujuan}}" style="display: none;">
                              <button type="submit" class="btn btn-primary btn-sm btn-flat">BOOK NOW</button>
                            </form>
                          @endif
                        </div>
                      </div>
                    </div>

                  @endif {{-- endif compare id_kapal without passenger --}}
                @endif {{-- endif compare wkt perjalanan without passenger --}}

                @php
                  $i++;
                @endphp

              @endforeach {{-- foreach allperjalanan without passenger --}}

            @endif {{-- endif compare data perjalanan > 0 --}}

          @else {{-- else jika rute tidak ada --}}
            <div class="disabled">
                <div class="alert alert-danger">Sorry, the route you are looking for is not available, please find another route.</div>
            </div>
          @endif {{-- endif compare all perjalanan > 0 --}}

        </table>
      </div>
    </div>
  </ul>

  </div>
</section>


@include('contact')
@include('footer')

@endsection
