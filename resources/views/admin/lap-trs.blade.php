@extends('admin.pages.template')
@include('admin.pages.header')
@section('content-header')
  @include('notification')

  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>Laporan Transaksi</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
@endsection

@section('content')
  <table border="0" cellspacing="5" cellpadding="5">
    <form class="" method="post" action="{{route('lap-trs-search')}}">
{{csrf_field()}}
        <tbody><tr>
            <td>Start Date : </td>
            {{-- <td><input type="text" id="min" name="min"/></td> --}}
            <td>
              <input type="date" name="s_tgl" id="s_tgl" value="{{$s_tgl == null ? date('Y-m-d', strtotime("-1 month")) : $s_tgl}}" required/>
            </td>
        </tr>
        <tr>
            <td>End Date : </td>
            {{-- <td><input type="text" id="max" name="max"/></td> --}}
            <td>
              <input type="date" name="e_tgl" id="e_tgl" value="{{$e_tgl == null ? date('Y-m-d', strtotime(now())) : $e_tgl }}" required/>
            </td>
        </tr>
        <tr>
          <td colspan="2">
            <button type="submit" class="btn btn-primary btn-sm" name="button">Search</button>
          </td>
        </tr>
    </tbody>
  </form>
  </table>
    <br>
  <table class="table" id="lap-trs-table">
      <thead>
          <tr>
              <th class="text-center" id="id_transaksi">#</th>
              <th class="text-center">No Transaksi</th>
              <th class="text-center">Nama</th>
              <th class="text-center">No KTP</th>
              <th class="text-center">No HP</th>
              <th class="text-center">Harga (IDR)</th>
              <th class="text-center">Departure</th>
              <th class="text-center">ID Perjalanan</th>
              <th class="text-center">Created At</th>
              <th class="text-center">Updated At</th>

          </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          {{-- <tr class="item{{$item->id_penumpang}}"> --}}
            <td>{{$item->id_penumpang}}</td>
            <td>{{$item->no_trans}}</td>
            <td>{{$item->nm_penumpang}}</td>
            <td>{{$item->no_ktp}}</td>
            <td>{{$item->no_hp}}</td>
            <td>{{$item->harga}}</td>
            <td>{{$item->departure}}</td>
            <td>{{$item->id_perjalanan}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
          </tr>
        @endforeach
      </tbody>
  </table>

  <script type="text/javascript">


  </script>

@endsection
