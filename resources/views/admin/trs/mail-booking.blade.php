<div style="background-color: #f7f7f7; margin: 10px; padding: 10px;">

  @php
    $count = count($user);
    $no = 1;
    $no_eng = 1;
  @endphp

  @foreach ($user as $key => $value)
  @endforeach


  <p><b>Dear {{ $value->nama_order }},</b></p>
  <p>Terimakasih telah melakukan pembelian tiket di <a href="JTIndonesia.com">JTIndonesia.com</a></p>
  <p>Berikut informasi tiket Anda:</p>

  @if ($count > 1)

    @foreach ($user as $key => $penumpang)
      <table>
        <tr>
          <td>Nama Penumpang {{$no}}</td>
          <td>:</td>
          <td>{{$penumpang->nama}}</td>
        </tr>
        <tr>
          <td>Nomor ID</td>
          <td>:</td>
          <td>{{$penumpang->no_ktp}}</td>
        </tr>
        <tr>
          <td>Kode Booking</td>
          <td>:</td>
          <td>{{$penumpang->kd_booking}}</td>
        </tr>
        <tr>
          <td>Fast Boat</td>
          <td>:</td>
          <td>{{$penumpang->nama_kapal}} ({{ $penumpang->alias_kapal }})</td>
        </tr>
        <tr>
          <td>Rute (Dari - Ke)</td>
          <td>:</td>
          @foreach ($dest as $key => $destinasi)
            @if ($destinasi->id_destinasi == $penumpang->id_asal)
              <td>{{ $destinasi->nama }} -
            @endif
            @if ($destinasi->id_destinasi == $penumpang->id_tujuan)
              {{ $destinasi->nama }}</td>
            @endif
          @endforeach
        </tr>
        <tr>
          <td>Berangkat</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam)) }}</td>
        </tr>
        <tr>
          <td>Estimasi Kedatangan</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam) + $penumpang->durasi) }}</td>
        </tr>
        <tr>
          <td>Harga</td>
          <td>:</td>
          <td>
            IDR {{ number_format($penumpang->harga_dewasa, 2, ',', '.')}}
          </td>
        </tr>
      </table>
      <br>
      <hr>

      @php
        $no += 1;
      @endphp

    @endforeach

  @else
    @foreach ($user as $key => $penumpang)
      <table>
        <tr>
          <td>Nama Penumpang</td>
          <td>:</td>
          <td>{{$penumpang->nama}}</td>
        </tr>
        <tr>
          <td>Nomor ID</td>
          <td>:</td>
          <td>{{$penumpang->no_ktp}}</td>
        </tr>
        <tr>
          <td>Kode Booking</td>
          <td>:</td>
          <td>{{$penumpang->kd_booking}}</td>
        </tr>
        <tr>
          <td>Fast Boat</td>
          <td>:</td>
          <td>{{$penumpang->nama_kapal}} ({{ $penumpang->alias_kapal }})</td>
        </tr>
        <tr>
          <td>Rute (Dari - Ke)</td>
          <td>:</td>
          @foreach ($dest as $key => $destinasi)
            @if ($destinasi->id_destinasi == $penumpang->id_asal)
              <td>{{ $destinasi->nama }} -
            @endif
            @if ($destinasi->id_destinasi == $penumpang->id_tujuan)
              {{ $destinasi->nama }}</td>
            @endif
          @endforeach
        </tr>
        <tr>
          <td>Berangkat</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam)) }}</td>
        </tr>
        <tr>
          <td>Estimasi Kedatangan</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam) + $penumpang->durasi) }}</td>
        </tr>
        <tr>
          <td>Harga</td>
          <td>:</td>
          <td>
            IDR {{ number_format($penumpang->harga_dewasa, 2, ',', '.')}}
          </td>
        </tr>
      </table>

    @endforeach

  @endif

  <p>
    Anda dapat mengecek informasi pesanan Anda pada website <a href="https://jtindonesia.com">jtindonesia.com</a>.
  </p>

  <p>Untuk informasi lebih lanjut mengenai proses pembayaran, silakan menghubungi lewat email : <a href="mailto:info@jtindonesia.com?subject=Booking Information">info@jtindonesia.com</a></p>
  <p>Terima Kasih atas kepercayaan Anda, <a href="JTIndonesia.com">JTIndonesia.com</a></p>

<br>
<br>

  <h2>English</h2>

  <p><b>Dear {{ $value->nama_order }},</b></p>
  <p>Thank you for making a ticket purchase at <a href="JTIndonesia.com">JTIndonesia.com</a></p>
  <p>Here's your ticket information:</p>

  @if ($count > 1)

    @foreach ($user as $key => $penumpang)
      <table>
        <tr>
          <td>Passenger Name {{$no_eng}}</td>
          <td>:</td>
          <td>{{$penumpang->nama}}</td>
        </tr>
        <tr>
          <td>ID Number</td>
          <td>:</td>
          <td>{{$penumpang->no_ktp}}</td>
        </tr>
        <tr>
          <td>Booking Code</td>
          <td>:</td>
          <td>{{$penumpang->kd_booking}}</td>
        </tr>
        <tr>
          <td>Fast Boat</td>
          <td>:</td>
          <td>{{$penumpang->nama_kapal}} ({{ $penumpang->alias_kapal }})</td>
        </tr>
        <tr>
          <td>Route (From - To)</td>
          <td>:</td>
          @foreach ($dest as $key => $destinasi)
            @if ($destinasi->id_destinasi == $penumpang->id_asal)
              <td>{{ $destinasi->nama }} -
            @endif
            @if ($destinasi->id_destinasi == $penumpang->id_tujuan)
              {{ $destinasi->nama }}</td>
            @endif
          @endforeach
        </tr>
        <tr>
          <td>Departure</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam)) }}</td>
        </tr>
        <tr>
          <td>Estimated Arrival</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam) + $penumpang->durasi) }}</td>
        </tr>
        <tr>
          <td>Price</td>
          <td>:</td>
          <td>
            IDR {{ number_format($penumpang->harga_dewasa, 2, ',', '.')}}
          </td>
        </tr>
      </table>
      <br>
      <hr>

      @php
        $no_eng += 1;
      @endphp

    @endforeach

  @else
    @foreach ($user as $key => $penumpang)
      <table>
        <tr>
          <td>Passenger Name</td>
          <td>:</td>
          <td>{{$penumpang->nama}}</td>
        </tr>
        <tr>
          <td>ID Number</td>
          <td>:</td>
          <td>{{$penumpang->no_ktp}}</td>
        </tr>
        <tr>
          <td>Booking Code</td>
          <td>:</td>
          <td>{{$penumpang->kd_booking}}</td>
        </tr>
        <tr>
          <td>Fast Boat</td>
          <td>:</td>
          <td>{{$penumpang->nama_kapal}} ({{ $penumpang->alias_kapal }})</td>
        </tr>
        <tr>
          <td>Route (From - To)</td>
          <td>:</td>
          @foreach ($dest as $key => $destinasi)
            @if ($destinasi->id_destinasi == $penumpang->id_asal)
              <td>{{ $destinasi->nama }} -
            @endif
            @if ($destinasi->id_destinasi == $penumpang->id_tujuan)
              {{ $destinasi->nama }}</td>
            @endif
          @endforeach
        </tr>
        <tr>
          <td>Departure</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam)) }}</td>
        </tr>
        <tr>
          <td>Estimated Arrival</td>
          <td>:</td>
          <td>{{$penumpang->departure}} , {{ date("H:i", strtotime($penumpang->jam) + $penumpang->durasi) }}</td>
        </tr>
        <tr>
          <td>Price</td>
          <td>:</td>
          <td>
            IDR {{ number_format($penumpang->harga_dewasa, 2, ',', '.')}}
          </td>
        </tr>
      </table>

    @endforeach

  @endif

  <p>
    You can check your order information on the website <a href="https://jtindonesia.com">jtindonesia.com</a>.
  </p>

  <p> For more information about the payment process, please contact via email: <a href="mailto:info@jtindonesia.com?subject=Booking Information">info@jtindonesia.com</a></p>
  <p> Thank you for your trust, <a href="JTIndonesia.com">JTIndonesia.com</a> </p>

</div>
