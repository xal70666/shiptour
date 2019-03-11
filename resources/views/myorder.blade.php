@extends('template')
@section('content')

  <style type="text/css">
    #td_paid {
      background-color: green;
    }

    #td_wait {
      background-color: orange;
    }
  </style>

<section id="" class="status-sec" style="margin-top: 100px">
  <div class="container">
    <table class="table table-responsive">
      <tr>
        <th>Order</th>
        <th>Date</th>
        <th>Payment Status</th>
      </tr>

      @foreach ($transaksi as $key => $trs)
        <tr>
          <td>
            <a class="portfolio-link" data-toggle="modal" href="#{{$trs->id_transaksi}}" >{{$trs->no_transaksi}}</a>
          </td>
          <td>{{ $trs->tgl_pesan }}</td>
          @if ($trs->status_bayar == 'menunggu')
            <td colspan="2" id="td_wait">Waiting for payment</td>
            <td>{{ $trs->batas_pembayaran }}</td>
          @elseif ($trs->status_bayar == 'dibayar')
            <td id="td_paid">Paid</td>
          @elseif ($trs->status_bayar == 'expired')
            <td id="td_expired">Expired</td>
          @endif
        </tr>
      @endforeach

      @foreach ($transaksi as $key => $value)
        <div class="portfolio-modal modal fade" id="{{$value->id_transaksi}}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
              <div class="container">
                <div class="row">
                  <div class="col-lg-12 mx-auto">
                    <div class="modal-body">
                      <!-- Project Details Go Here -->
                      <h2 class="text-uppercase">Order Detail</h2>
                      {{-- <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p> --}}
                      <div class="row">
                        <div class="col-sm-2">
                          <p><b>#</b></p>
                        </div>
                        <div class="col-sm-2">
                          <p><b>Passenger Name</b></p>
                        </div>
                        <div class="col-sm-2">
                          <p><b>ID Number</b></p>
                        </div>
                        <div class="col-sm-2">
                          <p><b>From > To</b></p>
                        </div>
                        <div class="col-sm-2">
                          <p><b>Departure</b></p>
                        </div>
                        <div class="col-sm-2">
                          <p><b>Price</b></p>
                        </div>
                        @php
                        $num = 1;
                        $ttl = 0;
                        @endphp
                      </div>
                        @foreach ($trs_penumpang as $key => $penumpang)
                          @if ($penumpang->id_transaksi == $value->id_transaksi)
                            <div class="row">
                              <div class="col-sm-2">
                                <p>{{ $num }}</p>
                              </div>
                              <div class="col-sm-2">
                                <p>{{ $penumpang->nama }}</p>
                              </div>
                              <div class="col-sm-2">
                                <p>{{ $penumpang->no_ktp }}</p>
                              </div>

                              @foreach ($destinasi as $key => $asal)
                                @if ($asal->id_destinasi == $penumpang->id_asal)
                                  <div class="col-sm-2">
                                    <p>{{ $asal->nama }} > </p>
                                @endif
                                @if ($asal->id_destinasi == $penumpang->id_tujuan)
                                    <p>{{$asal->nama}}</p>
                                  </div>
                                @endif
                              @endforeach

                              <div class="col-sm-2">
                                <p>{{ $penumpang->departure}}, {{$penumpang->jam}}</p>
                              </div>
                              <div class="col-sm-2">
                                <p>{{ $penumpang->harga }}</p>
                              </div>
                            </div>
                            @php
                            $ttl += $penumpang->harga;
                            $num++;
                            @endphp
                          @endif
                        @endforeach
                        <div class="row">
                          <div class="col-sm-2">
                          </div>
                          <div class="col-sm-2">
                          </div>
                          <div class="col-sm-2">
                          </div>
                          <div class="col-sm-2">
                          </div>
                          <div class="col-sm-2">
                            <b>Total</b>
                          </div>
                          <div class="col-sm-2">
                            <p>{{ $ttl }}</p>
                          </div>
                        </div>
                      {{-- <ul class="list-inline">
                        <li>Date: January 2017</li>
                        <li>Client: Threads</li>
                        <li>Category: Illustration</li>
                      </ul> --}}
                      <button class="btn btn-primary" data-dismiss="modal" type="button">
                        <i class="fa fa-times"></i>Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      @endforeach
    </table>
  </div>
</section>

@include('contact')
@include('footer')

@endsection
