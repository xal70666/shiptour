@extends('admin.pages.template')
@include('admin.pages.header')
@section('content-header')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Transaksi
      <small>List Kapal</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
@endsection

@section('content')

{!! Form::model($data, ['route' => ['p-edit-kapal', $data->id_kapal]]) !!}
{{ method_field('PATCH') }}

{!! Form::text("id_kapal",null,['id'=>'id_kapal', 'value' => $data->id_kapal, 'style' => 'display: none;']) !!}

<div class="form-group row required">
  {!! Form::label("nama","Nama Kapal",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("nama_kapal",null,["class"=>"form-control".($errors->has('nama_kapal')?" is-invalid":""),'placeholder'=>'Nama Kapal','id'=>'focus']) !!}
    <span id="error-name" class="invalid-feedback"></span>
  </div>
</div>
<div class="form-group row required">
  {!! Form::label("alias_kapal","Alias Kapal",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("alias_kapal",null,["class"=>"form-control".($errors->has('alias_kapal')?" is-invalid":""),'placeholder'=>'Alias Kapal','id'=>'focus']) !!}
    <span id="error-name" class="invalid-feedback"></span>
  </div>
</div>
<div class="form-group row required">
  {!! Form::label("kapasitas","Kapasitas",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("kapasitas",null,["class"=>"form-control".($errors->has('kapasitas')?" is-invalid":""),'placeholder'=>'Kapasitas']) !!}
    <span id="error-no_ktp" class="invalid-feedback"></span>
  </div>
</div>

<div class="form-group row">
  <div class="col-md-9">
    <button type="submit" class="btn btn-info-sm">
      Update
    </button>
  </div>
</div>

{!! Form::close() !!}
@endsection
