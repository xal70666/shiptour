@extends('template')
@section('content')
  {{-- @include('email.payment_email') --}}
  <script>
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<style media="screen">
.content {
  width: 650px;
}
.pull-left {
float: left!important;
}

.pull-right {
  float: right!important;
}

.sidebar {
padding: 10px;
border-radius: 15px;
background-color: #ced4da;
width: 455px;
}
.dotted {
border: 1px dotted #000000;
border-style: none none dotted;
color: #fff;
background-color: #fff;
}

.sidebar2 {
padding: 10px;
border-radius: 15px;
background-color: #ced4da;
width: 500px;
}

.sidebar3 {
padding: 10px;
border-radius: 15px;
width: 400px;
}

.dotted {
border: 1px dotted #000000;
border-style: none none dotted;
color: #fff;
background-color: #fff;
}

/*  */


.timeline {
    list-style: none;
    padding: 20px 0 20px;
    position: relative;
}

    .timeline:before {
        top: 0;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 3px;
        background-color: #eeeeee;
        left: 50%;
        margin-left: -1.5px;
    }

    .timeline > li {
        margin-bottom: 20px;
        margin-left: 20px;
        position: relative;
    }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li:before,
        .timeline > li:after {
            content: " ";
            display: table;
        }

        .timeline > li:after {
            clear: both;
        }

        .timeline > li > .timeline-panel {
            width: 46%;
            float: left;
            border: 1px solid #d4d4d4;
            border-radius: 2px;
            padding: 20px;
            position: relative;
            -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
            box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
        }

            .timeline > li > .timeline-panel:before {
                position: absolute;
                top: 26px;
                right: -15px;
                display: inline-block;
                border-top: 15px solid transparent;
                border-left: 15px solid #ccc;
                border-right: 0 solid #ccc;
                border-bottom: 15px solid transparent;
                content: " ";
            }

            .timeline > li > .timeline-panel:after {
                position: absolute;
                top: 27px;
                right: -14px;
                display: inline-block;
                border-top: 14px solid transparent;
                border-left: 14px solid #fff;
                border-right: 0 solid #fff;
                border-bottom: 14px solid transparent;
                content: " ";
            }

        .timeline > li > .timeline-badge {
            color: #fff;
            width: 30px;
            height: 30px;
            line-height: 50px;
            font-size: 1.4em;
            text-align: center;
            position: absolute;
            top: 16px;
            left: 50%;
            margin-left: -25px;
            background-color: #999999;
            z-index: 100;
            border-top-right-radius: 50%;
            border-top-left-radius: 50%;
            border-bottom-right-radius: 50%;
            border-bottom-left-radius: 50%;
        }

        .timeline > li.timeline-inverted > .timeline-panel {
            float: right;
        }

            .timeline > li.timeline-inverted > .timeline-panel:before {
                border-left-width: 0;
                border-right-width: 15px;
                left: -15px;
                right: auto;
            }

            .timeline > li.timeline-inverted > .timeline-panel:after {
                border-left-width: 0;
                border-right-width: 14px;
                left: -14px;
                right: auto;
            }

.timeline-badge.primary {
    background-color: #2e6da4 !important;
}

.timeline-badge.success {
    background-color: #3f903f !important;
}

.timeline-badge.warning {
    background-color: #f0ad4e !important;
}

.timeline-badge.danger {
    background-color: #d9534f !important;
}

.timeline-badge.info {
    background-color: #5bc0de !important;
}

.timeline-title {
    margin-top: 0;
    color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
    margin-bottom: 0;
}

    .timeline-body > p + p {
        margin-top: 5px;
    }

@media (max-width: 767px) {
    ul.timeline:before {
        left: 40px;
    }

    ul.timeline > li > .timeline-panel {
        width: calc(100% - 90px);
        width: -moz-calc(100% - 90px);
        width: -webkit-calc(100% - 90px);
    }

    ul.timeline > li > .timeline-badge {
        left: 6px;
        margin-left: 0;
        top: 16px;
    }

    ul.timeline > li > .timeline-panel {
        float: right;
    }

        ul.timeline > li > .timeline-panel:before {
            border-left-width: 0;
            border-right-width: 15px;
            left: -15px;
            right: auto;
        }

        ul.timeline > li > .timeline-panel:after {
            border-left-width: 0;
            border-right-width: 14px;
            left: -14px;
            right: auto;
        }
}
</style>
<section id="services" style="margin-top: 100px">
  <div class="container">


    <div class="form-horizontal" style="margin-top: 100px;">
      <h3 style="color: #007bff;">Review your order</h3>
      <hr>
      <div class="pull-right sidebar" >
        <h6 style="color: #007bff;">Price Detail</h6>
        <hr>
        <div class="price-info">
          <p><b>Departure :</b></p>
          <p class="">
            @foreach ($kapal as $key => $value)
              @if ($value->id_kapal == $id_kapal)
                {{ $value->nama_kapal}} ({{$from->nama}} - {{$to->nama}})</p>
              @endif
            @endforeach
            <div class="row">
              <div class="col-md-6">
                <p>Adult x{{$dewasa}}</p>
              </div>
              <div class="col-md-6">
                @foreach ($data_perjalanan as $key => $value)
                  @php
                    $harga_dewasa = $value->harga_dewasa;
                  @endphp
                  IDR {{ number_format($value->harga_dewasa, 2, ',', '.')}}
                @endforeach
              </div>
            </div>
            <hr class='dotted' />
            <div class="row">
              <div class="col-md-6">
                <p>Discount</p>
              </div>
              <div class="col-md-6">
                IDR {{0}}
              </div>
            </div>
            <hr class='dotted' />
            <div class="row">
              <div class="col-md-6">
                <p>Total Payment</p>
              </div>
              <div class="col-md-6">
                @php
                  // $total_harga = ((int)$dewasa * $harga_dewasa) + ((int)$anak * $harga_anak);
                  $total_harga = ((int)$dewasa * $harga_dewasa);
                @endphp
                IDR {{number_format($total_harga, 2, ',', '.')}}
              </div>
            </div>
          </div>
        </div>

        <div class="panel panel-info">
          {{-- <div class="panel-heading"><span class="label label-default" style="color: #fec810;"><b>Passenger {{$i+1}}</b></span></div> --}}
          <div class="panel-body">
              <div class="form-group">
                <div class="row">
                </div>
                <div class="row">
                  <div class="col-md-10">
                    @foreach ($kapal as $key => $value)
                      @if ($value->id_kapal == $id_kapal)
                        <img src="/images/icon-ship.ico" alt="" width="30px" height="30px"><b> <p style="float: center;">Fast Boat : {{ $value->nama_kapal}}</p></b>
                      @endif
                    @endforeach
                    <ul class="timeline">
                     <li>
                       <div class="timeline-badge info"><i class="glyphicon glyphicon-check"></i></div>
                       {{-- <div class="timeline-panel"> --}}
                         <div class="timeline-heading from" style="float: right;">
                           <h4 class="timeline-title">{{$from->nama}}</h4>
                           @foreach ($data_perjalanan as $key => $time)
                           @endforeach
                           <p><small class="text-muted">{{$departure}} {{date('H:i', strtotime($time->jam))}}</small></p>
                         </div>
                         {{-- <div class="timeline-body">
                           <p>Mussum ipsum cacilds, vidis litro abertis. C.</p>
                         </div> --}}
                       {{-- </div> --}}
                     </li>
                     <li class="timeline-inverted">
                       <div class="timeline-badge danger"><i class="glyphicon glyphicon-credit-card"></i></div>
                       {{-- <div class="timeline-panel"> --}}
                         <div class="timeline-heading to" style="float: right;">
                           <h4 class="timeline-title">{{$to->nama}}</h4>
                           <p><small class="text-muted">{{$departure}} {{date('H:i', strtotime($value->jam) + 3600)}}</small></p>
                         </div>
                       {{-- </div> --}}
                     </li>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="information-booking sidebar2">
          @php
            $no = 1;
          @endphp
          <div class="price-info">
            <p><b>Order Infrormation</b></p>
            <hr>
            @foreach ($id_last_trs as $key => $trs)
              <table>
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
                <tr>
                  <td>Order Number Phone</td>
                  <td>:</td>
                  <td>{{$trs->no_telp_order}}</td>
                </tr>
              </table>
              <br>
            @endforeach

            @foreach ($data_input_penumpang as $key => $penumpang)

              <p><b>Passenger {{$no}}</b></p>
              <hr>
              <table>
                <tr>
                  <td>Passenger Name</td>
                  <td>:</td>
                  <td>{{ $penumpang->nama }}</td>
                </tr>
                <tr>
                  <td>ID Number</td>
                  <td>:</td>
                  <td>{{ $penumpang->no_ktp }}</td>
                </tr>
                <tr>
                  <td>Phone Number</td>
                  <td>:</td>
                  <td>{{ $penumpang->no_hp }}</td>
                </tr>
              </table>
              <br>
              @php
              $no = $no+1;
              @endphp
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-md-8">
        <div class="pull-right sidebar3" >
          <div class="panel panel-primary">
            <p> We are waiting for your payment, please transfer a total of IDR {{number_format($total_harga, 2, ',', '.')}} with the payment deadline until : <b> {{ $batas_pembayaran}} </b> </p>
            <p> To complete your order, please follow the instructions below : </ p>

            <ol>
              <li> Make a payment of IDR {{number_format($total_harga, 2, ',', '.')}} before the time limit for the message specified in the BNI account {{ $no_rek }} In the name of Baihaqi </li>
              <li> Confirm your payment by sending proof of payment via email <b> toursship@gmail.com </b> </li>
              <li> Within a maximum of 12 hours our team will verify your transfer proof. </li>
              <li> Your order will be canceled automatically if the transfer deadline starts when this order is made, ie 1 hour from the order or does not provide proof of transfer for 1 hour. </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

  <!-- Contact -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contact Us</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2017</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-facebook"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fa fa-linkedin"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
@endsection
