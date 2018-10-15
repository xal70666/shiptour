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
    width: 50%;
    padding: 10px;
  }
</style>

  @php
    date_default_timezone_set('Asia/Jakarta');
    $jam = date("G:i:s");
    $tanggal = date("Y-m-d");
    $tgl_jam = date("Y-m-d H:i:s");
    // dd(date("Y-m-d H:i:s", strtotime($jam) + 43200) > date("Y-m-d H:i:s"));

  @endphp

<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="oneform2">
<div class="container">

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
          <select name="dewasa" class="form-control">
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
        <button type="submit" class="btn btn-info">Search</button>
      </div>
    </div>
    </form>
</div>
</div>

<section id="services" style="margin-top: 16%">
  <div class="container">
    <div class="avail text-left">
      <div class="row">
        <img src="/images/icon-ship.ico" alt="" width="30px" height="30px"><b style="font-size: 20px;">Select Departure</b>
        <p>{{$from->nama}} - {{$to->nama}} | {{$departure}}, {{$dewasa}} Person </p>
      </div>
      <div class="row">
      <div class="col-md-12">
        <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
          <span class="sr-only"><i class="fa-li fa fa-spinner fa-spin"></i>45% Complete</span>
        </div>
        <table class="" width="100%">
          {{-- cek jika data perjalanan ada --}}
          @if ($data_perjalanan->count() > 0)

            {{-- fetch semua perjalanan yang ada --}}
            @foreach ($all_perjalanan as $key => $value)
              <tr>
                <td>
                  <div class="container">

                    {{-- fetch data perjalanan berdasarkan inputan --}}
                    @foreach ($data_perjalanan as $key => $perjalanan)
                    @endforeach
                    {{-- jika jam pemberangkatan + 12 jam sudah melewati jam sekarang --}}
                    @if (date("Y-m-d H:i:s", strtotime($jam) + 43200) > date("Y-m-d H:i:s", strtotime("$tgl_berangkat $value->jam")))

                    {{-- @if (date("H:i:s", strtotime($jam) + 10800) > $value->jam) --}}
                      <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                          <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                          <p><b>Departure Time : </b>{{$value->jam}}</p>
                          <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>
                          <div class="alert alert-danger">Waktu booking sudah tidak bisa</div>
                      </div>
                    @else

                      @if (!(($perjalanan->kapasitas - count($data_perjalanan)) - $total_penumpang <= 0) && $value->id_kapal == $perjalanan->id_kapal && !($perjalanan->kapasitas < $total_penumpang)) {{-- hitung kapasitas --}}
                        <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">

                          <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                          @if ($value->id_kapal == $perjalanan->id_kapal)
                            <p><b>Available Capacity : </b>{{$perjalanan->kapasitas - count($data_perjalanan)}}</p>
                            <p><b>Departure Time : </b>{{$perjalanan->jam}}</p>
                            <p><b>Price : </b>IDR {{ number_format($perjalanan->harga_dewasa, 2, ',', '.')}}</p>
                          @else
                            <p><b>Available Capacity : </b>{{$perjalanan->kapasitas}}</p>
                            <p><b>Departure Time : </b>{{$perjalanan->jam}}</p>
                            <p><b>Price : </b>IDR {{ number_format($perjalanan->harga_dewasa, 2, ',', '.')}}</p>
                          @endif

                          <form action="{{route('booking')}}" method="post">
                            <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                            <input type="text" name="tgl_berangkat" value="{{$tgl_berangkat}}" style="display: none;">
                            <input type="text" name="departure" value="{{$departure}}" style="display: none;">
                            <input type="text" name="total_penumpang" value="{{$total_penumpang}}" style="display: none;">
                            <input type="text" name="from" value="{{$from}}" style="display: none;">
                            <input type="text" name="to" value="{{$to}}" style="display: none;">
                            <input type="text" name="id_kapal" value="{{$value->id_kapal}}" style="display: none;">
                            <input type="text" name="id_perjalanan" value="{{$perjalanan->id_perjalanan}}" style="display: none;">
                            <input type="text" name="dewasa" value="{{$dewasa}}" style="display: none;">
                            {{-- <input type="text" name="anak" value="{{$anak}}" style="display: none;"> --}}
                            <input type="text" name="id_asal" value="{{$perjalanan->id_asal}}" style="display: none;">
                            <input type="text" name="id_tujuan" value="{{$perjalanan->id_tujuan}}" style="display: none;">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat">PESAN SEKARANG</button>
                          </form>
                        </div>
                        <br>

                      {{-- else jika kapasaitas habis --}}
                      @else
                        <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                          <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>

                          {{-- compare id_kapal --}}
                          @if ($value->id_kapal == $perjalanan->id_kapal)
                            <p><b>Available Capacity : </b>{{$perjalanan->kapasitas - count($data_perjalanan)}}</p>
                            <p><b>Departure Time : </b>{{$perjalanan->jam}}</p>
                            <p><b>Price : </b>IDR {{ number_format($perjalanan->harga_dewasa, 2, ',', '.')}}</p>
                            <div class="alert alert-danger">Kursi Habis</div>
                          @else
                            <p><b>Available Capacity : </b>{{$value->kapasitas}}</p>
                            <p><b>Departure Time : </b>{{$value->jam}}</p>
                            <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>

                            {{-- form booking --}}
                              <form action="{{route('booking')}}" method="post">
                              <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                              <input type="text" name="tgl_berangkat" value="{{$tgl_berangkat}}" style="display: none;">
                              <input type="text" name="departure" value="{{$departure}}" style="display: none;">
                              <input type="text" name="total_penumpang" value="{{$total_penumpang}}" style="display: none;">
                              <input type="text" name="from" value="{{$from}}" style="display: none;">
                              <input type="text" name="to" value="{{$to}}" style="display: none;">
                              <input type="text" name="id_kapal" value="{{$value->id_kapal}}" style="display: none;">
                              <input type="text" name="id_perjalanan" value="{{$perjalanan->id_perjalanan}}" style="display: none;">
                              <input type="text" name="dewasa" value="{{$dewasa}}" style="display: none;">
                              {{-- <input type="text" name="anak" value="{{$anak}}" style="display: none;"> --}}
                              <input type="text" name="id_asal" value="{{$perjalanan->id_asal}}" style="display: none;">
                              <input type="text" name="id_tujuan" value="{{$perjalanan->id_tujuan}}" style="display: none;">
                              <button type="submit" class="btn btn-primary btn-sm btn-flat">PESAN SEKARANG</button>
                            </form>
                          @endif
                        </div>
                        <br>

                      @endif
                    @endif
                </div>
                <hr>
                </td>
              </tr>
            @endforeach

          {{-- jika perjalanan tidak ada --}}
          @else

            {{-- jika rute perjalanan tidak ditemukan --}}
            @if ($all_perjalanan->count() == 0)
              <div class="contains">
                <div class="alert alert-info">
                  <p align="center">
                    Sorry, the trip route was not found, please find another route.
                  </p>
                </div>
              </div>
            @else

              {{-- fetch semua perjalanan yang ada --}}
              @foreach ($all_perjalanan as $key => $value)
                <tr>
                  <td>

                    {{-- jika jam pemberangkatan + 12 jam sudah melewati jam sekarang --}}
                    @if (date("Y-m-d H:i:s", strtotime($jam) + 43200) > date("Y-m-d H:i:s", strtotime("$tgl_berangkat $value->jam")))

                    {{-- @if (date("H:i:s", strtotime($jam) + 10800) > $value->jam && $tgl_berangkat == $tanggal) --}}
                      <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                          <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                          <p><b>Departure Time : </b>{{$value->jam}}</p>
                          <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>
                          <div class="alert alert-danger">Waktu booking sudah tidak bisa</div>
                      </div>
                    @else
                      @if (!($value->kapasitas < $total_penumpang)) {{-- hitung kapasitas --}}
                        <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">

                          <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                          <p><b>Available Capacity : </b>{{$value->kapasitas}}</p>
                          <p><b>Departure Time : </b>{{$value->jam}}</p>
                          <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>

                          <form action="{{route('booking')}}" method="post">
                            <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                            <input type="text" name="tgl_berangkat" value="{{$tgl_berangkat}}" style="display: none;">
                            <input type="text" name="departure" value="{{$departure}}" style="display: none;">
                            <input type="text" name="from" value="{{$from}}" style="display: none;">
                            <input type="text" name="to" value="{{$to}}" style="display: none;">
                            <input type="text" name="total_penumpang" value="{{$total_penumpang}}" style="display: none;">
                            <input type="text" name="id_kapal" value="{{$value->id_kapal}}" style="display: none;">
                            <input type="text" name="id_perjalanan" value="{{$value->id_perjalanan}}" style="display: none;">
                            <input type="text" name="dewasa" value="{{$dewasa}}" style="display: none;">
                            {{-- <input type="text" name="anak" value="{{$anak}}" style="display: none;"> --}}
                            <input type="text" name="id_asal" value="{{$value->id_asal}}" style="display: none;">
                            <input type="text" name="id_tujuan" value="{{$value->id_tujuan}}" style="display: none;">
                            <button type="submit" class="btn btn-primary btn-sm btn-flat">PESAN SEKARANG</button>
                          </form>
                      @else
                        <p><b>Fast Boat : </b>{{$value->nama_kapal}}</p>
                        <p><b>Available Capacity : </b>{{$value->kapasitas}}</p>
                        <p><b>Departure Time : </b>{{$value->jam}}</p>
                        <p><b>Price : </b>IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}</p>
                        <div class="alert alert-danger">Kursi Habis</div>
                      </div>
                      <br>
                      @endif
                    @endif
                  </td>
                </tr>
              @endforeach
            @endif

          @endif
        </table>
      </div>
    </div>
  </div>
</section>

<!-- Contact -->
<section id="contact">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h2 class="section-heading text-uppercase">Contact Us</h2>
        <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <form id="contactForm" name="sentMessage" novalidate>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
              <div class="form-group">
                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 text-center">
              <div id="success"></div>
              <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <span class="copyright">Copyright &copy; Your Website 2017</span>
      </div>
      <div class="col-md-4">
        <ul class="list-inline social-buttons">
          <li class="list-inline-item">
            <a href="#">
              <i class="fa fa-twitter"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fa fa-facebook"></i>
            </a>
          </li>
          <li class="list-inline-item">
            <a href="#">
              <i class="fa fa-linkedin"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-4">
        <ul class="list-inline quicklinks">
          <li class="list-inline-item">
            <a href="#">Privacy Policy</a>
          </li>
          <li class="list-inline-item">
            <a href="#">Terms of Use</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</footer>
@endsection
