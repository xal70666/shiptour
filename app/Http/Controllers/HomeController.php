<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Response;

use App\Destinasi;
use App\Kapal;
use App\Penumpang;
use App\Transaksi;
use App\TransaksiDetail;
use App\Perjalanan;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $destinasi = Destinasi::all();
        $kapal = Kapal::all();

        return view('index', compact('destinasi', 'kapal'));
    }

    public function getTo($param)
    {
      //GET THE ACCOUNT BASED ON TYPE
      $destinasi2 = Destinasi::where('id_destinasi','!=',$param)->get();
      //CREATE AN ARRAY
      $options = array();
      foreach ($destinasi2 as $arrayForEach) {
                $options += array($arrayForEach->id_destinasi => $arrayForEach->nama);
            }

      return Response::json($options);
    }

    public function available(Request $request)
    {
      $input = $request->all();
      $destinasi = Destinasi::all();
      $kapal = Kapal::all();

      $data_perjalanan = DB::table('perjalanan')->where('id_asal', '=', $input['from'])
                                 ->where('id_tujuan', '=', $input['to'])
                                 ->get();

      foreach ($data_perjalanan as $key => $value) {
        $id_perjalanan = $value->id_perjalanan;
        $id_kapal = $value->id_kapal;
      }

      $data_kapal = DB::table('kapal')->where('id_kapal', $id_kapal)->get();

      foreach ($data_kapal as $key => $value) {
        $kapasitas_kpl = $value->kapasitas;
      }

      $count_trs = TransaksiDetail::where('id_perjalanan', $id_perjalanan)
                            ->where('status_bayar', 'dibayar')
                            ->where('departure', $input['departure'])
                            // ->where('arrival', $input['arrival'])
                            ->count();

      // $data_trs = TransaksiDetail::select('id_perjalanan')
      //                       ->where('id_perjalanan', $id_perjalanan)
      //                       ->where('status_bayar', 'dibayar')
      //                       ->groupBy('id_perjalanan')
      //                       ->get();

      $kapasitas_tersedia = $kapasitas_kpl - $count_trs;

      $data_perjalanan = json_decode($data_perjalanan->toJson(), true);
      $data_kapal = json_decode($data_kapal->toJson(), true);

      return view('available', compact('kapasitas_tersedia', 'data_perjalanan', 'data_kapal', 'destinasi', 'kapal'));
      // return Response::json([$data_perjalanan, $data_kapal]);

    }
}
