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
        $count_snorkeling = count($data_status_snorkeling);
        $no = 0;
      @endphp
      <div class="center" style="margin: 20px;">
        <div class='alert alert-light'>Check Your Transaction Status</div>
      @if ($count != 0)

        @foreach ($data_status as $key => $trs)
        @endforeach

        @php
        if ($trs->status_bayar == 'menunggu') {
          echo "<div class='alert alert-primary'>Payment Status : Waiting for payment.</div>";
          echo "<div class='alert alert-warning'>Payment Deadline : ". date("d-M-Y, H:i", strtotime($trs->batas_pembayaran)) . "</div>";
        }
        elseif ($trs->status_bayar == 'dibayar') {
          echo "<div class='alert alert-success'>Payment Status : Paid.</div>";
        }
        elseif ($trs->status_bayar == 'expired') {
          echo "<div class='alert alert-danger'>Payment Status : Expired.</div>";
          echo "<div class='alert alert-warning'>Payment Deadline : ". date("d-M-Y, H:i", strtotime($trs->batas_pembayaran)) . "</div>";

        }
        @endphp
        <table style="margin: 10px; border: 0;" class="table">
          <tr>
            <td>Transaction Number</td>
            <td>:</td>
            <td>{{$trs->no_transaksi}}</td>
          </tr>
          <tr>
            <td>Order Date</td>
            <td>:</td>
            <td>{{$trs->tgl_pesan}}</td>
          </tr>
          <tr>
            <td>Order Name</td>
            <td>:</td>
            <td>{{$trs->nama_order}}</td>
          </tr>
          <tr>
            <td>Order Email</td>
            <td>:</td>
            <td>{{$trs->email_order}}</td>
          </tr>
        </table>
        <br>
        @foreach ($data_status as $key => $value)
          <table  style="margin: 10px;" class="table">
          <tr>
            <td>Passenger {{$no = $no + 1}}</td>
            <td>:</td>
            <td>{{$value->nama}}</td>
          </tr>
          <tr>
            <td>ID Number</td>
            <td>:</td>
            <td>{{$value->no_ktp}}</td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>:</td>
            <td>{{$value->no_hp}}</td>
          </tr>
          <tr>
            <td>&nbsp</td>
          </tr>
        </table>
      </div>

        @endforeach

      @elseif ($count_snorkeling != 0)

        @foreach ($data_status_snorkeling as $key => $trs)
        @endforeach

        @php
        if ($trs->status_bayar == 'menunggu') {
          echo "<div class='alert alert-primary'>Payment Status : Waiting for payment.</div>";
        }
        elseif ($trs->status_bayar == 'dibayar') {
          echo "<div class='alert alert-success'>Payment Status : Paid.</div>";
        }
        elseif ($trs->status_bayar == 'expired') {
          echo "<div class='alert alert-danger'>Payment Status : Expired.</div>";
        }
        @endphp
        <div class='alert alert-warning'>Payment Deadline : {{date("d-M-Y, H:i", strtotime($trs->batas_pembayaran))}}</div>
        <table style="margin: 10px; border: 0;" class="table">
          <tr>
            <td>Transaction Number</td>
            <td>:</td>
            <td>{{$trs->no_transaksi}}</td>
          </tr>
          <tr>
            <td>Order Date</td>
            <td>:</td>
            <td>{{$trs->tgl_pesan}}</td>
          </tr>
          <tr>
            <td>Order Name</td>
            <td>:</td>
            <td>{{$trs->nama_order}}</td>
          </tr>
          <tr>
            <td>Order Email</td>
            <td>:</td>
            <td>{{$trs->email_order}}</td>
          </tr>
        </table>
        <br>
        @foreach ($data_status_snorkeling as $key => $value)
          <table  style="margin: 10px;" class="table">
          <tr>
            <td>Passenger {{$no = $no + 1}}</td>
            <td>:</td>
            <td>{{$value->nama}}</td>
          </tr>
          <tr>
            <td>ID Number</td>
            <td>:</td>
            <td>{{$value->no_ktp}}</td>
          </tr>
          <tr>
            <td>Phone Number</td>
            <td>:</td>
            <td>{{$value->no_hp}}</td>
          </tr>
          <tr>
            <td>&nbsp</td>
          </tr>
        </table>
      </div>

        @endforeach

      @elseif ($count == 0 && $count_snorkeling == 0)
        <div style="margin: 20px;">

          <p>Sorry, the transaction number you entered is incorrect, please try again.</p>
          <div class="row">
            <div class="col-lg-8" style="float: none; margin 0 auto;">
              <div class="form-horizontal">
                <form action="{{route('check_status')}}" method="post" class="form">
                  <input type="text" name="_token" value="{{csrf_token()}}" style="display: none;">
                  <label for="no_trs">Please enter your transaction number below : </label>
                  <input class="form-control" id="no_trs" name="no_trs" placeholder="Transaction Number" type="text" required>
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
   <div class="panel" style="background-color: #dddddd;">

   <div class="alert alert-info">Information</div>
   <p style="margin: 10px;">
     If the status is <strong>waiting for payment</strong>, immediately pay according to the instructions via e-mail that has been sent. When it is paid and confirmed, the status will change to be <strong>paid</strong>.
     If the status is <strong>expired</strong>, then payment cannot be done, then please order again.
   </p>
 </div>
</div>
<br>
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
