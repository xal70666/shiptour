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
use App\PerjalananSnorkeling;
use App\Snorkeling;

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


    // ====================coba bikin web services
    $var = array();
    $kapal = Kapal::all();
    for($i = 0; $i < count($kapal); $i++) {
     $var[] = ${"variable$i"}[] = [0, $kapal[$i]->id_kapal];
    }
// dd($var);
    foreach ($all_perjalanan as $key => $value) {
      foreach ($data_perjalanan as $key => $perjalanan) {
        if ($value->id_kapal == $perjalanan->id_kapal) {
          for ($i=0; $i < count($var) ; $i++) {
            if ($perjalanan->id_kapal == $var[$i][1]) {
              $var[$i] = array($var[$i][0] + 1, $var[$i][1]);
            }
          }
      }
    }
  }

  return view('available', compact('data_perjalanan', 'all_perjalanan', 'total_penumpang', 'dewasa', 'anak', 'from', 'to', 'destinasi', 'departure', 'tgl_berangkat', 'kapal', 'var'));


    // ============

    $pakai1[] = 0;
    $pakai2[] = 0;
    $pakai3[] = 0;
    $pakai4[] = 0;


    foreach ($all_perjalanan as $key => $value) {
      foreach ($data_perjalanan as $key => $perjalanan) {
        if ($value->id_kapal == $perjalanan->id_kapal) {
          if ($perjalanan->id_kapal == 1) {

            $pakai1 = array($pakai1[0] + 1, 1);

            if ($perjalanan->id_kapal == 2) {
                $pakai2 = array($pakai2[0] + 1, 2);
            }
            else {
              $pakai2 = array(0, 2);
            }

            if ($perjalanan->id_kapal == 3) {
                $pakai3 = array($pakai3[0] + 1, 3);
            }
            else {
              $pakai3 = array(0, 3);
            }

            if ($perjalanan->id_kapal == 4) {
                $pakai4 = array($pakai4[0] + 1, 4);
            }
            else {
              $pakai4 = array(0, 4);
            }
          }

          elseif($perjalanan->id_kapal == 2) {
            $pakai2 = array($pakai2[0] + 1, 2);

            if ($perjalanan->id_kapal == 1) {
                $pakai1 = array($pakai1[0] + 1, 1);
            }
            else {
              $pakai1 = array(0, 1);
            }

            if ($perjalanan->id_kapal == 3) {
                $pakai3 = array($pakai3[0] + 1, 3);
            }
            else {
              $pakai3 = array(0, 3);
            }

            if ($perjalanan->id_kapal == 4) {
                $pakai4 = array($pakai4[0] + 1, 4);
            }
            else {
              $pakai4 = array(0, 4);
            }
          }

          elseif($perjalanan->id_kapal == 3) {
            $pakai3 = array($pakai3[0] + 1, 3);

            if ($perjalanan->id_kapal == 1) {
                $pakai1 = array($pakai1[0] + 1, 1);
            }
            else {
              $pakai1 = array(0, 1);
            }


            if ($perjalanan->id_kapal == 2) {
                $pakai2 = array($pakai2[0] + 1, 2);
            }
            else {
              $pakai2 = array(0, 2);
            }

            if ($perjalanan->id_kapal == 4) {
                $pakai4 = array($pakai4[0] + 1, 4);
            }
            else {
              $pakai4 = array(0, 4);
            }

          }
        }
      }
    }

     return view('available', compact('data_perjalanan', 'all_perjalanan', 'total_penumpang', 'dewasa', 'anak', 'from', 'to', 'destinasi', 'departure', 'tgl_berangkat', 'kapal', 'pakai1', 'pakai2', 'pakai3', 'pakai4'));
    }

    public function booking(Request $request) {
      $input = $request->all();
      $id_pemesan = $input['id_pemesan'];
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
      $data_pemesan = User::where('id', $id_pemesan)->get();
      // $total_penumpang = $dewasa + $anak;
      $total_penumpang = $dewasa;

      $from = Destinasi::where('id_destinasi', $input['id_asal'])->first();
      $to = Destinasi::where('id_destinasi', $input['id_tujuan'])->first();

      $data_perjalanan = DB::table('perjalanan')
                             ->where('id_perjalanan', '=', $id_perjalanan)
                             ->get();

      $departure = Carbon::parse($input['departure'])->format('l, jS F Y');

      return view('booking', compact('data_perjalanan', 'all_perjalanan', 'total_penumpang', 'dewasa', 'anak', 'from', 'to', 'kapal', 'destinasi', 'departure',
                  'tgl_berangkat', 'id_kapal', 'id_perjalanan', 'id_asal', 'id_tujuan', 'data_pemesan'));

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
          $message->from('info@jtindonesia.com','JTIndonesia');
      });

      return true;
    }

    public function mail_ubay($no_trs, $no_rek, $nm_asal, $nm_tujuan, $email_cust, $nama_cust, $batas_pembayaran, $ttl_harga) {

      $data = array(
        "no_trs" => $no_trs,
        "no_rek" => $no_rek,
        "email_cust" => $email_cust,
        "nama_cust" => $nama_cust,
        "batas_pembayaran" => $batas_pembayaran,
        "ttl_harga" => $ttl_harga,
      );

      Mail::send('email.mail_ubay', $data, function($message) use ($email_cust, $nama_cust, $no_trs) {
          $message->to('ubay62@gmail.com', $nama_cust)
                  ->subject('Your Order ' . $no_trs .' Waiting for Payment.');
          $message->from('info@jtindonesia.com','JTIndonesia');
      });

      return true;
    }

    public function mail_snorkeling($no_trs, $no_rek, $email_order, $nama_order, $batas_pembayaran, $ttl_harga, $data_destinasi, $departure) {

      $data = array(
        "no_trs" => $no_trs,
        "no_rek" => $no_rek,
        "email_order" => $email_order,
        "nama_order" => $nama_order,
        "batas_pembayaran" => $batas_pembayaran,
        "ttl_harga" => $ttl_harga,
        "data_destinasi" => $data_destinasi,
        "departure" => $departure,
      );

      Mail::send('email.mail_snorkeling', $data, function($message) use ($email_order, $nama_order, $no_trs) {
          $message->to($email_order, $nama_order)
                  ->subject('Your Order ' . $no_trs .' Waiting for Payment.');
          $message->from('info@jtindonesia.com','JTIndonesia');
      });

      return true;
    }

    public function mail_snorkeling_ubay($no_trs, $no_rek, $email_order, $nama_order, $batas_pembayaran, $ttl_harga, $data_destinasi, $departure) {

      $data = array(
        "no_trs" => $no_trs,
        "no_rek" => $no_rek,
        "email_order" => $email_order,
        "nama_order" => $nama_order,
        "batas_pembayaran" => $batas_pembayaran,
        "ttl_harga" => $ttl_harga,
        "data_destinasi" => $data_destinasi,
        "departure" => $departure,
      );

      Mail::send('email.mail_snorkeling', $data, function($message) use ($email_order, $nama_order, $no_trs) {
          $message->to('ubay62@gmail.com', $nama_order)
                  ->subject('Your Order ' . $no_trs .' Waiting for Payment.');
          $message->from('info@jtindonesia.com','JTIndonesia');
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
      $id_pemesan = $request['id_pemesan'];
      if ($id_pemesan == 0) {
        $ket = 'BY GUEST';
      }
      else {
        $ket = '';
      }
      $from = Destinasi::where('id_destinasi', $request['id_asal'])->first();
      $to = Destinasi::where('id_destinasi', $request['id_tujuan'])->first();
      $data_pemesan = User::where('id', $id_pemesan)->get();

      $dewasa = $request['dewasa'];
      $tanggal = date("Y-m-d");
      $now = date("Y-m-d G:i:s");
      $jam = date("G:i:s");
      $email_cust = $request["email_order"];
      $nama_cust = $request["name_order"];
      $batas_pembayaran = date("Y-m-d H:i:s", strtotime($jam) + 3600);
      $no_rek = '4611-01-008456-53-9';
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
      $trs->id_pemesan = $id_pemesan;
      $trs->ket = $ket;
      $trs->no_telp_order = $request["no_telp_order"];
      $trs->nama_order = $request["name_order"];
      $trs->email_order = $request["email_order"];
      $trs->status_bayar = "menunggu";
      $trs->created_at = Carbon::now();
      $trs->updated_at = Carbon::now();
      $trs->save();

      // looping total penumpang
      for ($i=0; $i < $request['total_penumpang']; $i++) {
        $kd_booking = Strtoupper(Str::random(3)) .''. substr((int)microtime(true), -5);

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
          'kd_booking' => $kd_booking,
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
      $this->mail($no_trs, $no_rek, $nm_asal, $nm_tujuan, $email_cust, $nama_cust, $batas_pembayaran, $ttl_harga, $nama_cust);
      $this->mail_ubay($no_trs, $no_rek, $nm_asal, $nm_tujuan, $email_cust, $nama_cust, $batas_pembayaran, $ttl_harga, $nama_cust);

      return view('payment', compact('data_perjalanan', 'data_trs','data_trs_dtl', 'no_trs', 'kapal', 'id_kapal', 'from', 'to', 'dewasa', 'departure', 'nama_cust',
                                      'email_cust', 'data_input_penumpang', 'id_last_trs', 'batas_pembayaran', 'no_rek'));
    }

    public function check_status(Request $request) {
      return view('check_status');
    }

    public function post_check_status(Request $request) {
      $input = $request['no_trs'];
      $clean = str_replace(' ', '', strtoupper($input));
      $no_trs = str_replace('#', '', $clean);

      $data_status = DB::table('transaksi')
                            ->join('penumpang', 'transaksi.id_transaksi', '=', 'penumpang.id_transaksi')
                            ->join('perjalanan', 'penumpang.id_perjalanan', '=', 'perjalanan.id_perjalanan')
                            // ->join('destinasi', 'perjalanan.id_asal', '=', 'destinasi.id_destinasi')
                            ->where('no_transaksi', $no_trs)
                            ->get();

      $data_status_snorkeling = DB::table('transaksi')
                            ->join('snorkeling', 'transaksi.id_transaksi', '=', 'snorkeling.id_transaksi')
                            ->where('no_transaksi', $no_trs)
                            ->get();

      $dest = Destinasi::all();

      return view('result_status', compact('data_status', 'dest', 'data_status_snorkeling'));
    }

    public function check_booking(Request $request) {
      return view('check_booking');
    }

    public function post_check_booking(Request $request) {
      $input = $request['kd_book'];
      $clean = str_replace(' ', '', strtoupper($input));
      $kd_book = str_replace('#', '', $clean);

      $data_status = DB::table('penumpang')
                            ->join('perjalanan', 'penumpang.id_perjalanan', '=', 'perjalanan.id_perjalanan')
                            ->join('kapal', 'perjalanan.id_kapal', '=', 'kapal.id_kapal')
                            ->where('kd_booking', $kd_book)
                            ->get();

      $dest = Destinasi::all();
      // dd($data_status);

      return view('result_kd_booking', compact('data_status', 'dest'));

    }

    public function book_snorkeling(Request $request) {
      $jam = date("G:i:s");
      $tanggal = date("Y-m-d");
      $tgl_jam = date("Y-m-d H:i:s");

      $person = $request['person'];
      $departure = $request['departure'];
      $id_destinasi = $request['id_destinasi'];

      $destinasi = Destinasi::where('id_destinasi', $id_destinasi)->get();



      $destinasi = Destinasi::all();
      $kapal = Kapal::all();

      // $validator = Validator::make($input, [
      //   'm' => 'required',
      //   'to' => 'required',
      //   'departure' => 'required|date',
      // ]);
      //
      // if ($validator->fails()) {
      //   return redirect(route('home'))->withErrors($validator)->withInput(Input::all());
      // }


      $format_departure = Carbon::parse($departure)->format('l, jS F Y');

      $all_perjalanan = DB::table('perjalanan_snorkeling')
                            ->join('kapal', 'perjalanan_snorkeling.id_kapal', '=', 'kapal.id_kapal')
                            ->where('id_destinasi', $id_destinasi)
                            ->get();

      $data_perjalanan = DB::table('perjalanan_snorkeling')
                             ->join('kapal', 'perjalanan_snorkeling.id_kapal', '=', 'kapal.id_kapal')
                             ->join('destinasi', 'perjalanan_snorkeling.id_destinasi', '=', 'destinasi.id_destinasi')
                             ->join('snorkeling', 'perjalanan_snorkeling.id_perjalanan_snorkeling', '=', 'snorkeling.id_perjalanan_snorkeling')
                             ->where([
                               ['perjalanan_snorkeling.id_destinasi', $id_destinasi],
                               ['departure', $departure]
                             ])
                             ->where(function($query) {
                               $query ->where('status_bayar', '=', 'menunggu')
                                      ->orWhere('status_bayar', '=', 'dibayar');
                             })->get();

      $count_data_perjalanan = count($data_perjalanan);




      if ($count_data_perjalanan != 0) {

        foreach ($all_perjalanan as $key => $perjalanan) {

          if (date("Y-m-d H:i", strtotime($jam) + 43200) > date("Y-m-d H:i", strtotime("$departure $perjalanan->jam"))) {
            return Redirect::back()->withErrors(['Booking time has passed. Please find another date.', 'The Message'])->withInput(Input::all());
          }

          else {
            if (($count_data_perjalanan + $person) > $perjalanan->kapasitas) {
              return Redirect::back()->withErrors(['Seat is full', 'The Message'])->withInput(Input::all());
            }
            else {
                return view('book_snorkeling', compact('person', 'departure', 'destinasi', 'id_destinasi', 'destinasi', 'data_perjalanan', 'all_perjalanan'));
            }
          }

        }
      }

      else {
        foreach ($all_perjalanan as $key => $perjalanan) {
          if (date("Y-m-d H:i", strtotime($jam) + 43200) > date("Y-m-d H:i", strtotime("$departure $perjalanan->jam"))) {
            return Redirect::back()->withErrors(['Booking time has passed. Please find another date.', 'The Message'])->withInput(Input::all());
          }
          else {
            return view('book_snorkeling', compact('person', 'departure', 'destinasi', 'id_destinasi', 'destinasi', 'data_perjalanan', 'all_perjalanan'));
          }
        }
      }


    }

    public function process_book_snorkeling(Request $request) {
      date_default_timezone_set('Asia/Jakarta');

      $jam = date("G:i:s");
      $no_trs = Strtoupper(Str::random(5)) . '/' . Carbon::now()->format('d') . '' . Carbon::now()->format('m') .''. Carbon::now()->format('y') .'/'.substr((int)microtime(true), -5);
      $batas_pembayaran = date("Y-m-d H:i:s", strtotime($jam) + 3600);
      $no_rek = '4611-01-008456-53-9';

      $nama_order = $request['name_order'];
      $email_order = $request['email_order'];
      $no_telp_order = $request['no_telp_order'];
      $id_destinasi = $request['id_destinasi'];

      $departure = $request['departure'];
      $id_perjalanan_snorkeling = $request['id_perjalanan_snorkeling'];
      $person = $request['person'];
      $ttl_harga = $person * 300000;

      $trs = new Transaksi;
      $data_destinasi = Destinasi::where('id_destinasi', $id_destinasi)->get();

      // input tbl transaksi
      $trs->tgl_pesan = Carbon::now();
      $trs->no_transaksi = $no_trs;
      $trs->id_pemesan = 0;
      $trs->ket = "BY GUEST";
      $trs->no_telp_order = $request["no_telp_order"];
      $trs->nama_order = $request["name_order"];
      $trs->email_order = $request["email_order"];
      $trs->status_bayar = "menunggu";
      $trs->created_at = Carbon::now();
      $trs->updated_at = Carbon::now();
      $trs->save();

      // looping total penumpang
      for ($i=0; $i < $person; $i++) {
        $kd_booking = Strtoupper(Str::random(3)) .''. substr((int)microtime(true), -5);

        // get id transaksi terahir
        $id_last_trs = DB::table('transaksi')->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();

        $arr_penumpang[] = array(
          'harga' => "300000",
          'id_transaksi' => $id_last_trs[0]->id_transaksi,
          'status_bayar' => "menunggu",
          'departure' => $departure,
          'id_perjalanan_snorkeling' => $id_perjalanan_snorkeling,
          'batas_pembayaran' => $batas_pembayaran,
          'nama' => $request['name'.($i+1).''],
          'no_ktp' => $request['id_number'.($i+1).''],
          'no_hp' => $request['no_telp'.($i+1).''],
          'kd_booking' => $kd_booking,
          'alamat' => '',
          'umur' => 0,
          'type' => '',
          'created_at' => Carbon::now(),
          'updated_at' => Carbon::now()
        );
      }

      // insert tbl penumpang
      DB::table('snorkeling')->insert($arr_penumpang);

      // get data penumpang yang sudah di input
      $id_last_trs = DB::table('transaksi')->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();
      $data_input_penumpang = DB::table("snorkeling")->where('id_transaksi', '=', DB::raw("(select max(`id_transaksi`) from transaksi)"))->get();

      // send mail for payment
      $this->mail_snorkeling($no_trs, $no_rek, $email_order, $nama_order, $batas_pembayaran, $ttl_harga, $data_destinasi, $departure);
      $this->mail_snorkeling_ubay($no_trs, $no_rek, $email_order, $nama_order, $batas_pembayaran, $ttl_harga, $data_destinasi, $departure);

      return view('booking-snorkeling-payment', compact('ttl_harga', 'person', 'data_input_penumpang', 'batas_pembayaran', 'id_last_trs', 'data_destinasi', 'departure'));

    }
}
