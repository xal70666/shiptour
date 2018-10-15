<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

use Response;
use Validator;
use Carbon\Carbon;

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

      $validator = Validator::make($input, [
        'from' => 'required',
        'to' => 'required',
        'departure' => 'required|date',
      ]);

      if ($validator->fails()) {
        return redirect(route('home'))->withErrors($validator)->withInput(Input::all());
      }

      $from = Destinasi::where('id_destinasi', $input['from'])->first();
      $to = Destinasi::where('id_destinasi', $input['to'])->first();

      $dewasa = $input['dewasa'];
      // $anak = $input['anak'];
      $tgl_berangkat = $input['departure'];

      $departure = Carbon::parse($input['departure'])->format('l, jS F Y');


      // $total_penumpang = $dewasa + $anak;
      $total_penumpang = $dewasa;

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
                             // ->join('transaksi_dtl', 'perjalanan.id_perjalanan', '=', 'transaksi_dtl.id_perjalanan')
                             ->join('penumpang', 'perjalanan.id_perjalanan', '=', 'penumpang.id_perjalanan')
                             // ->select(DB::raw('perjalanan.*, (products.kapasitas - .tauxDiscount/100) as newPrice'))
                             // ->join('destinasi', 'perjalanan.id_tujuan', '=', 'destinasi.id_destinasi')
                             ->where([
                               ['id_asal', $input['from']],
                               ['id_tujuan', $input['to']],
                               ['departure', $input['departure']]
                             ])
                             ->where(function($query) {
                               $query ->where('status_bayar', '=', 'menunggu')
                                      ->orWhere('status_bayar', '=', 'dibayar');
                             })->get();

     return view('available', compact('data_perjalanan', 'all_perjalanan', 'total_penumpang', 'dewasa', 'anak', 'from', 'to', 'destinasi', 'departure', 'tgl_berangkat'));
    }

    public function booking(Request $request) {
      $input = $request->all();
      $dewasa = $input['dewasa'];
      // $anak = $input['anak'];
      $id_kapal = $input['id_kapal'];
      $id_perjalanan = $input['id_perjalanan'];
      $id_asal = $input['id_asal'];
      $id_tujuan = $input['id_tujuan'];

      $tgl_berangkat = $input['tgl_berangkat'];

      $departure = Carbon::parse($input['tgl_berangkat'])->format('l, jS F Y');
      $destinasi = Destinasi::all();
      $kapal = Kapal::all();

      // $total_penumpang = $dewasa + $anak;
      $total_penumpang = $dewasa;

      $from = Destinasi::where('id_destinasi', $input['id_asal'])->first();
      $to = Destinasi::where('id_destinasi', $input['id_tujuan'])->first();

      $data_perjalanan = DB::table('perjalanan')
                             ->where('id_perjalanan', '=', $id_perjalanan)
                             ->get();

      $departure = Carbon::parse($input['departure'])->format('l, jS F Y');
      return view('booking', compact('data_perjalanan', 'all_perjalanan', 'total_penumpang', 'dewasa', 'anak', 'from', 'to', 'kapal', 'destinasi', 'departure', 'tgl_berangkat', 'id_kapal', 'id_perjalanan', 'id_asal', 'id_tujuan'));

    }

    public function mail($no_trs, $no_rek, $nm_asal, $nm_tujuan, $email_cust, $nama_cust, $batas_pembayaran, $ttl_harga) {

      $data = array(
        "no_trs" => $no_trs,
        "no_rek" => $no_rek,
        "email_cust" => $email_cust,
        "nama_cust" => $nama_cust,
        "batas_pembayaran" => $batas_pembayaran,
        "ttl_harga" => $ttl_harga,
      );

      Mail::send('email.mail', $data, function($message) use ($email_cust, $nama_cust, $no_trs) {
          $message->to($email_cust, $nama_cust)
                  ->subject('Your Order ' . $no_trs .' Waiting for Payment.');
          $message->from('toursship@gmail.com','ShipTours');
      });

      return true;
    }

    public function payment_mail($no_trs, $no_rek, $nm_asal, $nm_tujuan)
    {
       // $this->no_trs = $no_trs;
       // $this->no_rek = $no_rek;
       // $this->nm_asal $nm_asal;
       // $this->$nm_tujuan = $nm_tujuan;

       Mail::to('ubay62@gmail.com')->send(new SendMailable($no_trs, $no_rek, $nm_tujuan, $nm_asal));

       return $this->returnPayment();
    }

    public function payment(Request $request) {
      date_default_timezone_set('Asia/Jakarta');
      $departure = Carbon::parse($request['departure'])->format('l, jS F Y');
      $kapal = Kapal::all();
      $id_kapal = $request['id_kapal'];
      $from = Destinasi::where('id_destinasi', $request['id_asal'])->first();
      $to = Destinasi::where('id_destinasi', $request['id_tujuan'])->first();
      $dewasa = $request['dewasa'];
      $tanggal = date("Y-m-d");
      $now = date("Y-m-d G:i:s");
      $jam = date("G:i:s");
      $email_cust = $request["email_order"];
      $nama_cust = $request["name_order"];
      $batas_pembayaran = date("Y-m-d H:i:s", strtotime($jam) + 3600);
      $no_rek = '98123987';
      $data_perjalanan = DB::table('perjalanan')->where('id_perjalanan', '=', $request['id_perjalanan'])->get();
      $asal = DB::table('destinasi')->where('id_destinasi', '=', $request['id_asal'])->get();
      $tujuan = DB::table('destinasi')->where('id_destinasi', '=', $request['id_tujuan'])->get();
      $ttl_harga = $request['total_penumpang'] * $data_perjalanan[0]->harga_dewasa;
      $arr_penumpang  = array();
      $arr_trs_dtl = array();

      foreach ($asal as $key => $value_asal) {
        $id_asal = $value_asal->id_destinasi;
        $nm_asal = $value_asal->nama;
      }

      foreach ($tujuan as $key => $value_tujuan) {
        $id_tujuan = $value_tujuan->id_destinasi;
        $nm_tujuan = $value_tujuan->nama;
      }

      // generate no trs
      $no_trs = Strtoupper(Str::random(5)) . '/' . Carbon::now()->format('d') . '' . Carbon::now()->format('m') .''. Carbon::now()->format('y') .'/'.substr((int)microtime(true), -5);

      $penumpang = new Penumpang;
      $trs = new Transaksi;
      $trs_dtl = new TransaksiDetail;

      // input tbl transaksi
      $trs->tgl_pesan = Carbon::now();
      $trs->no_transaksi = $no_trs;
      $trs->id_pemesan = 0;
      $trs->ket = "BY GUEST";
      $trs->no_telp_order = $request["no_telp_order"];
      $trs->nama_order = $request["name_order"];
      $trs->email_order = $request["email_order"];
      $trs->created_at = Carbon::now();
      $trs->updated_at = Carbon::now();
      $trs->save();

      // looping total penumpang
      for ($i=0; $i < $request['total_penumpang']; $i++) {

        // get id transaksi terahir
        $id_last_trs = DB::table('transaksi')->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();
        // $id_last_penumpang = DB::table('penumpang')->where('id_penumpang', '=', DB::raw("(select max(`id_penumpang`) from penumpang)"))->get();

        $arr_penumpang[] = array(
          'harga' => $data_perjalanan[0]->harga_dewasa,
          'id_transaksi' => $id_last_trs[0]->id_transaksi,
          'id_perjalanan' => $request['id_perjalanan'],
          'status_bayar' => "menunggu",
          'departure' => $request['tgl_berangkat'],
          'batas_pembayaran' => $batas_pembayaran,
          'nama' => $request['name'.($i+1).''],
          'no_ktp' => $request['no_id'.($i+1).''],
          'no_hp' => $request['no_telp'.($i+1).''],
          'alamat' => '',
          'umur' => 0,
          'type' => '',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        );
      }

      // insert tbl penumpang
      DB::table('penumpang')->insert($arr_penumpang);

      // get data penumpang yang sudah di input
      $id_last_trs = DB::table('transaksi')->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();
      $data_input_penumpang = DB::table("penumpang")->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();

      // $data_trs = DB::table('transaksi')->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();
      // $data_trs_dtl = DB::table('transaksi')->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();


      // send mail for payment
      // $this->mail($no_trs, $no_rek, $nm_asal, $nm_tujuan, $email_cust, $nama_cust, $batas_pembayaran, $ttl_harga, $nama_cust);

      return view('payment', compact('data_perjalanan', 'data_trs','data_trs_dtl', 'no_trs', 'kapal', 'id_kapal', 'from', 'to', 'dewasa', 'departure', 'nama_cust',
                                      'email_cust', 'data_input_penumpang', 'id_last_trs', 'batas_pembayaran', 'no_rek'));
    }
}
