@extends('template')
@section('content')
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<style>

.container {
  display: flex;
  justify-content: center;
}
.center {
  .margin: 10px;
  .padding: 10px;
  width: 800px;
  background: #dddddd;
  font-weight: bold;
  font-family: Tahoma;
}
</style>

<section id="services" style="margin-top: 100px">
  <div class="container">


      @php
        $count = count($data_status);
        $no = 0;
      @endphp
      <div class="center" style="margin: 20px;">
        <div class='alert alert-light'>Check Your Booking Status</div>
      @if ($count != 0)

        @foreach ($data_status as $key => $data)
        {{-- @php
        if ($trs->status_bayar == 'menunggu') {
          echo "<div class='alert alert-primary'>Payment Status : Waiting for payment.</div>";
        }
        elseif ($trs->status_bayar == 'dibayar') {
          echo "<div class='alert alert-success'>Payment Status : Paid.</div>";
        }
        elseif ($trs->status_bayar == 'expired') {
          echo "<div class='alert alert-danger'>Payment Status : Expired.</div>";
        }
        @endphp --}}
        <table style="margin: 10px; border: 0;" class="table">
          <tr>
            <td>Name</td>
            <td>:</td>
            <td>{{$data->nama}}</td>
          </tr>
          <tr>
            <td>Booking Code</td>
            <td>:</td>
            <td>{{$data->kd_booking}}</td>
          </tr>
          <tr>
            <td>Id Number</td>
            <td>:</td>
            <td>{{$data->no_ktp}}</td>
          </tr>
          <tr>
            <td>Fast Boat</td>
            <td>:</td>
            <td>{{$data->nama_kapal}} ({{$data->alias_kapal}})</td>
          </tr>
          <tr>
            <td>Departure</td>
            <td>:</td>
            <td>{{$data->departure}}, {{date("H:i", strtotime($data->jam))}}</td>
          </tr>
          <tr>
            <td>Estimated Time Arrived (ETA)</td>
            <td>:</td>
            <td>{{$data->departure}}, {{date("H:i", strtotime($data->jam) + (int)$data->durasi)}}</td>
          </tr>
        </table>
        <br>
        @endforeach

      @else
        <div style="margin: 20px;">

          <p>Sorry, the booking code you entered is incorrect, please try again.</p>
          <div class="row">
            <div class="col-lg-8" style="float: none; margin 0 auto;">
              <div class="form-horizontal">
                <form action="{{route('check_booking')}}" method="post" class="form">
                  <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                  <label for="kd_book">Please enter your booking code below : </label>
                  <input class="form-control" id="kd_book" name="kd_book" placeholder="Booking Code" type="text" required>
                  <button type="submit" class="btn btn-primary btn-sm btn-flat">CHECK</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      @endif
  </div>
</section>

<section class="" name="" style="background-color: #fec810">
<div class="container">
  <div class="panel">
    <p>
      <h6>Do you have a question?</h6>
    </p>
    <p style="margin: 10px;">
 Please contact our customer service through:
 <ul>
   <li>
     Email : <a href="mailto:info@jtindonesia.com">info@jtindonesia.com</a>
   </li>
   <li>
     Phone: 0812-1019-4553 (Working Hours)
   </li>
 </ul>
    </p>
  </div>
</div>
</section>

@include('contact')
@include('footer')
@endsection
