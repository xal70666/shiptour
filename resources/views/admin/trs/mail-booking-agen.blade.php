<div style="background-color: #f7f7f7; margin: 10px; padding: 10px;">

  @php
    $count = count($user);
    $no = 1;
    $no_eng = 1;
  @endphp

  @foreach ($user as $key => $value)
  @endforeach


  <p><b>Dear Pak Wayan, </b></p>
  
  <p>Berikut informasi penumpang yang sudah bayar : </p>


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

</div>
