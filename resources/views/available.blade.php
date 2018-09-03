@extends('template')
@section('content')



  <meta name="csrf-token" content="{{ csrf_token() }}">

  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Available</h2>
          <h3>{{$from->nama}} - {{$to->nama}}</h3>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-md-12">
          <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
            <span class="sr-only"><i class="fa-li fa fa-spinner fa-spin"></i>45% Complete</span>
          </div>
          <table class="" width="50%">
            @if ($data_perjalanan->count() > 0)
              @foreach ($all_perjalanan as $key => $value)
                <tr>
                  <td>
                    <div class="container">
                      {{-- <p><b>Kapasitas : </b>{{$value->kapasitas}}</p> --}}
                      @foreach ($data_perjalanan as $key => $perjalanan)
                        @php
                        // $dipakai = $
                        @endphp
                      @endforeach
                      @if (!(($perjalanan->kapasitas - count($data_perjalanan)) - $total_penumpang <= 0))
                        <p><b>Nama Kapal : </b>{{$value->nama_kapal}}</p>
                        @if ($value->id_kapal == $perjalanan->id_kapal)
                          <p><b>Kapasitas Tersedia : </b>{{$perjalanan->kapasitas - count($data_perjalanan)}}</p>
                          <p><b>Kelas : </b>{{$perjalanan->kelas}}</p>
                        @else
                          <p><b>Kapasitas Tersedia : </b>{{$perjalanan->kapasitas}}</p>
                          <p><b>Kelas : </b>{{$perjalanan->kelas}}</p>
                        @endif

                        <form action="{{route('booking')}}" method="post">
                          <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                          <input type="text" name="id_kapal" value="{{$value->id_kapal}}" style="display: none;">
                          <input type="text" name="perjalanan" value="{{$perjalanan->id_perjalanan}}" style="display: none;">
                          <input type="text" name="dewasa" value="{{$dewasa}}" style="display: none;">
                          <input type="text" name="anak" value="{{$anak}}" style="display: none;">
                          <input type="text" name="asal" value="{{$perjalanan->id_asal}}" style="display: none;">
                          <input type="text" name="tujuan" value="{{$perjalanan->id_tujuan}}" style="display: none;">
                          <button type="submit" class="btn btn-primary btn-sm btn-flat">PESAN SEKARANG</button>
                        </form>
                      @else
                        <div class="disabled" style="background-color:#f1f1f1; padding: 10px;">
                          <p><b>Nama Kapal : </b>{{$value->nama_kapal}}</p>
                          @if ($value->id_kapal == $perjalanan->id_kapal)
                            <p><b>Kapasitas Tersedia : </b>{{$perjalanan->kapasitas - count($data_perjalanan)}}</p>
                            <p><b>Kelas : </b>{{$perjalanan->kelas}}</p>
                            <div class="alert alert-danger">Kursi Habis</div>
                          @else
                            <p><b>Kapasitas Tersedia : </b>{{$perjalanan->kapasitas}}</p>
                            <p><b>Kelas : </b>{{$perjalanan->kelas}}</p>
                          @endif
                        </div>

                      @endif
                  </div>
                  <hr>
                  </td>
                  {{-- <td width="50px">
                    <div class="container">

                    </div>
                  </td> --}}
                </tr>
              @endforeach
            @else
              @foreach ($all_perjalanan as $key => $value)
                <tr>
                  <td>
                    <p><b>Nama Kapal : </b>{{$value->nama_kapal}}</p>
                    <p><b>Kapasitas : </b>{{$value->kapasitas}}</p>
                    <p><b>Kelas : </b>{{$value->kelas}}</p>
                  </td>
                </tr>
              @endforeach
            @endif
          </table>
        </div>
      </div>
    </div>
  </section>

@endsection
