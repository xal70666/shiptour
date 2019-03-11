@extends('admin.pages.template')
@include('admin.pages.header')
@section('content-header')
  @include('notification')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Penumpang
      <small>Penumpang</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">Dashboard</li>
    </ol>
  </section>
@endsection

@section('content')


  <table class="table" id="pernumpang-table">
      <thead>
          <tr>
              <th class="text-center">#</th>
              <th class="text-center">No Transaksi</th>
              <th class="text-center">Nama Pemesan</th>
              <th class="text-center">Email</th>
              <th class="text-center">No Telp</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Email dikirim</th>
              <th class="text-center">Date dikirim</th>
              <th class="text-center">Action</th>

          </tr>
      </thead>
      <tbody>
        @foreach($data as $item)
          {{-- <tr class="item{{$item->id_transaksi}}"> --}}
            <td></td>
            <td>
              <a href="{{$item->id_transaksi}}">
                {{$item->no_transaksi}}
              </a>
            </td>
            <td>{{$item->nama_order}}</td>
            <td>{{$item->email_order}}</td>
            <td>{{$item->no_telp_order}}</td>
            <td>{{$item->ket}}</td>
            @if ($item->sta_booking_email == true || $item->sta_booking_email == 1)
              <td>Dikirim</td>
            @else
              <td>Belum Dikirim</td>
            @endif
            <td>{{$item->c_booking_email}}</td>
            {{-- <td><a href="{{action('AdminController@downloadPDF', $item->id_penumpang)}}">PDF</a></td> --}}
            <td>
              <form action="{{route('send-email-tiket-cust'), $item->id_transaksi}}" method="post">
                <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                <input type="text" name="id_transaksi" value="{{$item->id_transaksi}}" style="display:none;" />
                <button type="submit" name="button" class="btn btn-warning-sm">Send Email</button>
              </form>
            </td>

          </tr>
        @endforeach
      </tbody>
  </table>

  <div class="modal fade" id="modalForm" tabindex="-1" role="dialog" data-backdrop="static">

        <div class="modal-dialog" role="document">
            <div class="modal-content" id="modal_content">
              <div class="form-group row required">
                {!! Form::label("nama","nama",["class"=>"col-form-label col-md-3"]) !!}
                <div class="col-md-9">
                  {!! Form::text("nama",null,["class"=>"form-control".($errors->has('name')?" is-invalid":""),'placeholder'=>'Nama','id'=>'focus']) !!}
                  <span id="error-name" class="invalid-feedback"></span>
                </div>
              </div>
              <div class="form-group row">
                {!! Form::label("gender","Gender",["class"=>"col-form-label col-md-3"]) !!}
                <div class="col-md-9">
                  {!! Form::select("gender",['Male'=>'Male','Female'=>'Female'],null,["class"=>"form-control"]) !!}
                </div>
              </div>
              <div class="form-group row required">
                {!! Form::label("email","Email",["class"=>"col-form-label col-md-3"]) !!}
                <div class="col-md-9">
                  {!! Form::text("email",null,["class"=>"form-control".($errors->has('email')?" is-invalid":""),'placeholder'=>'Email']) !!}
                  <span id="error-email" class="invalid-feedback"></span>
                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" data-backdrop="static">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Delete Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Are you sure want to delete?</p>
                    <input type="hidden" id="delete_token"/>
                    <input type="hidden" id="delete_id"/>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-danger"
                            onclick="ajaxDelete('{{url('laravel-crud-search-sort-ajax-modal-form/delete')}}/'+$('#delete_id').val(),$('#delete_token').val())">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="loading">
            <i class="fa fa-refresh fa-spin fa-2x fa-fw"></i><br/>
            <span>Loading</span>
        </div> --}}

        <script src="{{asset('js/ajax-crud.js')}}"></script>

  <!-- Content Wrapper. Contains page content -->
  {{-- <div class="content-wrapper"> --}}


@endsection
