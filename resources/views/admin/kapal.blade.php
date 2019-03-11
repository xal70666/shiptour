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

<div class="row">
  <div class="col-lg-12">
    <span class="btn btn-info btn-sm">
      <a href="{{route("kapal-form")}}">
        <span class="fa fa-pencil" style="color: #ffffff">Insert</span>
      </a>
    </span>
  </div>
</div>
<br>
  <table class="table" id="kapal-table">
      <thead>
          <tr>
              <th class="text-center">#</th>
              <th class="text-center">Nama Kapal</th>
              <th class="text-center">Alias Kapal</th>
              <th class="text-center">Kelas</th>
              <th class="text-center">Kapasitas</th>
              <th class="text-center">ID Nakhoda</th>
              <th class="text-center">Updated At</th>
              <th class="text-center">Created At</th>
              <th class="text-center">Action</th>

          </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          {{-- <tr class="item{{$item->id_penumpang}}"> --}}
            <td>{{$item->id_kapal}}</td>
            <td>{{$item->nama_kapal}}</td>
            <td>{{$item->alias_kapal}}</td>
            <td>{{$item->kelas}}</td>
            <td>{{$item->kapasitas}}</td>
            <td>{{$item->id_nakhoda}}</td>
            <td>{{$item->created_at}}</td>
            <td>{{$item->updated_at}}</td>
            <td>

              <a href="{{route("edit-kapal", $item->id_kapal)}}" class="btn btn-info-sm">
                <span class="glyphicon glyphicon-edit"></span>Edit
              </a>
              {{ Form::open([ 'method'  => 'delete', 'route' => [ 'delete-kapal', $item->id_kapal ] ]) }}
                {{-- {{ Form::hidden('id', $item->id) }} --}}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger', 'onsubmit' => 'return confirm("are you sure ?");' ]) }}
              {{ Form::close() }}
              </td>

          </tr>
        @endforeach
      </tbody>
  </table>


@endsection
