@extends('admin.pages.template')
@include('admin.pages.header')
@section('content-header')
@include('notification')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>Transaksi Pelanggan</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
@endsection

@section('content')
  <table class="table" id="trs-table">
      <thead>
          <tr>
              <th class="text-center" id="id_transaksi">#</th>
              <th class="text-center">Nama</th>
              <th class="text-center">No KTP</th>
              <th class="text-center">No HP</th>
              <th class="text-center">Harga (IDR)</th>
              <th class="text-center">Departure</th>
              <th class="text-center">ID Perjalanan</th>
              <th class="text-center">No Transaksi</th>
              <th class="text-center">Status Bayar</th>
              <th class="text-center">Batas Pembayaran</th>
              <th class="text-center">Created At</th>
              <th class="text-center">Updated At</th>
              <th class="text-center">Action</th>

          </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          {{-- <tr class="item{{$item->id_penumpang}}"> --}}
            <td>{{$item->id_penumpang}}</td>
            <td>{{$item->nm_penumpang}}</td>
            <td>{{$item->no_ktp}}</td>
            <td>{{$item->no_hp}}</td>
            <td>{{$item->harga}}</td>
            <td>{{$item->departure}}</td>
            <td>{{$item->id_perjalanan}}</td>
            <td>{{$item->no_trans}}</td>
            <td>{{$item->status_bayar}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td>{{$item->batas_pembayaran}}</td>
            <td>
              <a href="{{route("edit-trs", $item->id_penumpang)}}" class="btn btn-info-sm">
                <span class="glyphicon glyphicon-edit"></span>Edit
              </a>
              {{ Form::open([ 'method'  => 'delete', 'route' => [ 'delete-trs', $item->id_penumpang ] ]) }}
                {{-- {{ Form::hidden('id', $item->id) }} --}}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onsubmit' => 'return confirm("are you sure ?");' ]) }}
              {{ Form::close() }}

                <a href="{{action('AdminController@downloadPDF', $item->id_penumpang)}}">PDF</a>
              </td>

          </tr>
        @endforeach
      </tbody>
  </table>

    {{-- <div class="loading">
            <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i><br/>
            <span>Loading</span>
        </div> --}}

        {{-- <script src="{{asset('js/ajax-crud.js')}}"></script> --}}

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}


@endsection
