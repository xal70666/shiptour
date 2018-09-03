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


      $from = Destinasi::where('id_destinasi', $input['from'])->first();
      $to = Destinasi::where('id_destinasi', $input['to'])->first();
      $dewasa = $input['dewasa'];
      $anak = $input['anak'];

      $total_penumpang = $dewasa + $anak;

      $all_perjalanan = DB::table('perjalanan')
                            ->join('kapal', 'perjalanan.id_kapal', '=', 'kapal.id_kapal')
                            ->join('destinasi', 'perjalanan.id_asal', '=', 'destinasi.id_destinasi')
                            // ->select(DB::raw('perjalanan.*, (products.kapasitas - .tauxDiscount/100) as newPrice'))
                            // ->join('destinasi', 'perjalanan.id_tujuan', '=', 'destinasi.id_destinasi')
                            ->where('id_asal', '=', $input['from'])
                            ->where('id_tujuan', '=', $input['to'])
                            ->get();

      $data_perjalanan = DB::table('perjalanan')
                             ->join('kapal', 'perjalanan.id_kapal', '=', 'kapal.id_kapal')
                             ->join('destinasi', 'perjalanan.id_asal', '=', 'destinasi.id_destinasi')
                             ->join('transaksi_dtl', 'perjalanan.id_perjalanan', '=', 'transaksi_dtl.id_perjalanan')
                             // ->select(DB::raw('perjalanan.*, (products.kapasitas - .tauxDiscount/100) as newPrice'))
                             // ->join('destinasi', 'perjalanan.id_tujuan', '=', 'destinasi.id_destinasi')
                             ->where('id_asal', '=', $input['from'])
                             ->where('id_tujuan', '=', $input['to'])
                             ->where('status_bayar', '=', 'dibayar')
                             ->get();

     return view('available', compact('data_perjalanan', 'all_perjalanan', 'total_penumpang', 'dewasa', 'anak', 'from', 'to'));
     // dd($all_perjalanan);

     // foreach ($data_perjalanan as $key => $value) {
     //   $count_trs[] = TransaksiDetail::select('id_transaksi_dtl')
     //                           // ->join('perjalanan', 'transaksi_dtl.id_perjalanan', '=', 'perjalanan.id_perjalanan')
     //                           ->where('id_perjalanan', $value->id_perjalanan)
     //                           ->where('status_bayar', 'dibayar')
     //                           ->where('departure', $input['departure'])
     //                           ->count();
     // }

     // dd($data_perjalanan);

      // foreach ($data_perjalanan as $key => $value) {
      //   $arr_perjalanan[] = $value->id_perjalanan;
      //   $arr_kapal[] = $value->id_kapal;
      // }
      //
      // for ($i=0; $i < count($id_perjalanan) ; $i++) {
      //   $count_trs[] = TransaksiDetail::where('id_perjalanan', $id_perjalanan[$i])
      //                         ->where('status_bayar', 'dibayar')
      //                         ->where('departure', $input['departure'])
      //                         // ->where('arrival', $input['arrival'])
      //                         ->count();
      //
      //   for ($i=0; $i < count($count_trs); $i++) {
      //     $kapasitas_tersedia[] = $kapasitas_kpl - $count_trs;
      //   }
      // }

      // $data_kapal = DB::table('kapal')->where('id_kapal', $id_kapal)->get();
      //
      // foreach ($data_kapal as $key => $value) {
      //   $kapasitas_kpl = $value->kapasitas;
      // }



      // $data_trs = TransaksiDetail::select('id_perjalanan')
      //                       ->where('id_perjalanan', $id_perjalanan)
      //                       ->where('status_bayar', 'dibayar')
      //                       ->groupBy('id_perjalanan')
      //                       ->get();


      // $data_perjalanan = json_decode($data_perjalanan->toJson(), true);
      // $data_kapal = json_decode($data_kapal->toJson(), true);
      //
      // return view('available', compact('kapasitas_tersedia', 'data_perjalanan', 'data_kapal', 'destinasi', 'kapal'));
      // return Response::json([$data_perjalanan, $data_kapal]);

    }

    public function booking(Request $request) {

    }
}
