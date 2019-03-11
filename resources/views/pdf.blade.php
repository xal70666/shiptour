<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="container">
      <div class="center" style="margin: 20px;">
        <div class='alert alert-light'>JTIndonesia.com</div>
        @foreach ($user as $key => $data)
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
    </div>
  </body>
</html>
