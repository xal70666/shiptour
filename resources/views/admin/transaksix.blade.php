<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

    <link rel="stylesheet"
    href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet"
    href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <table class="table" id="data">
        <thead>
            <tr>
                <th class="text-center">#</th>
                <th class="text-center">Nama</th>
                <th class="text-center">No KTP</th>
                <th class="text-center">No HP</th>
                <th class="text-center">Harga (IDR)</th>
                <th class="text-center">Departure</th>
                <th class="text-center">ID Perjalanan</th>
                <th class="text-center">ID Transaksi</th>
                <th class="text-center">Status Bayar</th>
                <th class="text-center">Batas Pembayaran</th>

            </tr>
        </thead>
        <tbody>
          @foreach($data as $item)
            <tr class="item{{$item->id_penumpang}}">
              <td>{{$item->id_penumpang}}</td>
              <td>{{$item->nama}}</td>
              <td>{{$item->no_ktp}}</td>
              <td>{{$item->no_hp}}</td>
              <td>{{$item->harga}}</td>
              <td>{{$item->departure}}</td>
              <td>{{$item->id_perjalanan}}</td>
              <td>{{$item->id_transaksi}}</td>
              <td>{{$item->status_bayar}}</td>
              <td>{{$item->batas_pembayaran}}</td>
              <td><button class="edit-modal btn btn-info"
                      data-info="{{$item->id}},{{$item->first_name}},{{$item->last_name}},{{$item->email}},{{$item->gender}},{{$item->country}},{{$item->salary}}">
                      <span class="glyphicon glyphicon-edit"></span> Edit
                  </button>
                  <button class="delete-modal btn btn-danger"
                      data-info="{{$item->id}},{{$item->first_name}},{{$item->last_name}},{{$item->email}},{{$item->gender}},{{$item->country}},{{$item->salary}}">
                      <span class="glyphicon glyphicon-trash"></span> Delete
                  </button></td>
            </tr>
          @endforeach
        </tbody>
    </table>
    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script
    src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>
    $(document).ready(function() {
      $('#table').DataTable();
    } );
    </script>

  </body>
</html>
