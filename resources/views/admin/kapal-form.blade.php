@extends('admin.pages.template')
@include('admin.pages.header')
@section('content-header')

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
    <h5>Add Kapal</h5>
  </div>
</div>

@if ($errors->any())
  <div class="alert alert-danger">
    <span >
      <a href="#" class="close" data-dismiss="alert" aria-label="close" id="hide">&times;</a>
    </span>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="row">
  <div class="col-md-6">
    <form class="form" action="{{route("p-kapal-form")}}" method="post">
      {{csrf_field()}}
      <div class="input-group">
        <label for="nama_kapal">Nama Kapal</span>
        <input type="text" class="form-control" placeholder="Nama Kapal" id="nama_kapal" name="nama_kapal" value="{{ old('nama_kapal')}}" required>
      </div>
      <div class="input-group">
        <label for="alias_kapal">Alias Kapal</span>
        <input type="text" class="form-control" placeholder="Alias Kapal" id="alias_kapal" name="alias_kapal" value="{{ old('alias_kapal')}}"  required>
      </div>
      <div class="input-group">
        <label for="kelas">Kelas</span>
        <input type="text" class="form-control" placeholder="" value="Ekonomi" id="kelas" name="kelas" disabled>
      </div>
      <div class="input-group">
        <label for="Kapasitas">Kapasitas</span>
        <input type="text" class="form-control" placeholder="Kapasitas" id="kapasitas" name="kapasitas" value="{{ old('kapasitas')}}" required>
      </div>
      <div class="input-group">
        <label for="id_nakhoda">ID Nakhoda</span>
        <input type="text" class="form-control" placeholder="" value="1" name="id_nakhoda" id="id_nakhoda" disabled>
      </div>
      <button type="submit" name="button" class="btn btn-primary btn-sm">Tambah</button>

    </form>
  </div>
</div>

@endsection
