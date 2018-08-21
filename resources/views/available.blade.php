@extends('template')
@section('content')
  {{-- ==================== --}}

  <div class="oneform">
    <form class="form-inline" role="form" id="form-oneform" method="post" action="{{ route('available')}}">
      {{csrf_field()}}
      <div class="cl1">
        <label for="from_avail">From</label>
        <div class="of-box">
          <select id="from_avail" name="from_avail">
            {{-- @foreach ($destinasi as $key => $value)
              <option>{{$value->nama}}</option>
            @endforeach --}}

            @foreach($destinasi as $value)
                <option value="{{$value->id_destinasi}}">{{$value->nama}}</option>
            @endforeach
          </select>
        </div>
      </div>
      {{-- <div class="cl5">
        <label for="kapal">Fastboat</label>
        <div class="of-box">
          <select id="kapal" name="kapal">
            @foreach ($kapal as $key => $value)
              <option value="{{ $value->id_kapal }}">{{ $value->nama_kapal }}</option>
            @endforeach
          </select>
        </div>
      </div> --}}
      <div class="cl2">
        <label for="to_avail">To</label>
        <div class="of-box">
          <select id="to_avail" name="to_avail">
            {{-- @foreach ($destinasi as $key => $value)
              <option>{{ $value->nama }}</option>
            @endforeach --}}
            <option value="">NA</option>
          </select>
        </div>
      </div>
      <div class="cl2">
        <label for="departure">Departure</label>
        <div class="of-box">
          <input type="text" name="departure" id="datepicker-departure">
        </div>
      </div>
      <div class="cl3">
        <label for="pp">Pulang</label>
        <div class="of-box">
          <input type="checkbox" id="pp" onclick="jikaPP()">
        </div>
      </div>
      <div class="cl4">
        <label for="arrival">Arrival</label>
        <div class="of-box">
          <input type="text" name="arrival" id="datepicker-arrival">
        </div>
      </div>
      {{-- <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="pwd">Password</label>
        <input type="password" class="form-control" id="pwd" placeholder="Enter password">
      </div> --}}
      <button type="submit" class="btn btn-default">Pesan</button>
    </form>
</div>

{{-- =================== --}}

  @foreach ($data_perjalanan as $key => $value)
    @php
      $id_kapal = $value['id_kapal'];
    @endphp
  @endforeach

  @foreach ($data_kapal as $key => $value)
      @php
        $kapasitas_kpl = $value['kapasitas'];
        $id_kapal2 = $value['id_kapal'];
        $nama_kapal = $value['nama_kapal'];
      @endphp
  @endforeach
  <section id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Available</h2>
        </div>
      </div>
      <div class="row text-left">
        <div class="col-md-12">
          {{-- <span class="fa-stack fa-4x">
            <i class="fa fa-circle fa-stack-2x text-primary"></i>
            <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
          </span> --}}
          <p>
            @if ($id_kapal == $id_kapal2)
              <b>Nama Kapal : </b>{{$nama_kapal}}
            @endif
          </p>
          <p>
            <b>Bangku Tersedia : </b>{{$kapasitas_tersedia}} <b> || Dari Kapasitas : </b> {{$kapasitas_kpl}}
          </p>
        </div>
      </div>
    </div>
  </section>

@endsection
