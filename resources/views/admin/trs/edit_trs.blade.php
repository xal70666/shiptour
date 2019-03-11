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

{{-- {{ Form::model($data, array('route' => 'p-edit-trs', $data->id_penumpang)) }} --}}
{!! Form::model($data, ['route' => ['p-edit-trs', $data->id_penumpang]]) !!}
{{ method_field('PATCH') }}

{!! Form::text("id_penumpang",null,['id'=>'id_penumpang', 'value' => $data->id_penumpang, 'style' => 'display: none;']) !!}

<div class="form-group row required">
  {!! Form::label("nama","Nama",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("nama",null,["class"=>"form-control".($errors->has('nama')?" is-invalid":""),'placeholder'=>'Nama','id'=>'focus']) !!}
    <span id="error-name" class="invalid-feedback"></span>
  </div>
</div>
<div class="form-group row required">
  {!! Form::label("status_bayar","Status Bayar",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::select("status_bayar",['menunggu'=>'menunggu','dibayar'=>'dibayar', 'expired' => 'expired'],null,["class"=>"form-control"]) !!}
  </div>
</div>
<div class="form-group row required">
  {!! Form::label("no_ktp","ID Number",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("no_ktp",null,["class"=>"form-control".($errors->has('no_ktp')?" is-invalid":""),'placeholder'=>'ID Number']) !!}
    <span id="error-no_ktp" class="invalid-feedback"></span>
  </div>
</div>
<div class="form-group row required">
  {!! Form::label("no_hp","No Hp",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("no_hp",null,["class"=>"form-control".($errors->has('no_hp')?" is-invalid":""),'placeholder'=>'No HP']) !!}
    <span id="error-no_hp" class="invalid-feedback"></span>
  </div>
</div>
<div class="form-group row required">
  {!! Form::label("kd_booking","Booking Code",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("kd_booking",null,["class"=>"form-control".($errors->has('kd_booking')?" is-invalid":""),'placeholder'=>'Booking Code', 'disabled']) !!}
    <span id="error-kd_booking" class="invalid-feedback"></span>
  </div>
</div>
<div class="form-group row required">
  {!! Form::label("harga","Harga",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("harga",null,["class"=>"form-control".($errors->has('harga')?" is-invalid":""),'placeholder'=>'Harga', 'disabled']) !!}
    <span id="error-harga" class="invalid-feedback"></span>
  </div>
</div>
<div class="form-group row disabled">
  {!! Form::label("batas_pembayaran","Batas Pembayaran",["class"=>"col-form-label col-md-3"]) !!}
  <div class="col-md-9">
    {!! Form::text("batas_pembayaran",null,["class"=>"form-control".($errors->has('batas_pembayaran')?" is-invalid":""),'placeholder'=>'No HP', 'disabled']) !!}
    <span id="error-batas_pembayaran" class="invalid-feedback"></span>
  </div>
</div>

<div class="form-group row">
  <div class="col-md-9">
    <button type="submit" class="btn btn-info-sm">
      Save
    </button>
  </div>
</div>

{!! Form::close() !!}
@endsection
