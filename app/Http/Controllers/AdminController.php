<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;

use App\Penumpang;
use App\Destinasi;
use App\Transaksi;
use App\Kapal;
use PDF;
use DB;
use Carbon\Carbon;
use Validator;


class AdminController extends Controller
{
    public function __construct(){
      $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = 'dashboard';
        return view('admin.index', compact('pages'));
    }

    public function transaksi()
    {
        $pages = 'transaksi';
        // $data = Penumpang::orderBy("id_transaksi", 'DESC')->get();
        $data = DB::table('penumpang AS p')
           ->join('transaksi', 'p.id_transaksi', 'transaksi.id_transaksi')
           ->join('perjalanan', 'p.id_perjalanan', 'perjalanan.id_perjalanan')
           ->select(['transaksi.no_transaksi AS no_trans', 'id_penumpang', 'p.nama as nm_penumpang', 'no_hp', 'no_ktp', 'harga', 'departure',
                      'p.status_bayar', 'batas_pembayaran', 'p.id_perjalanan', 'transaksi.created_at', 'transaksi.updated_at'])
           ->orderBy('transaksi.id_transaksi', 'desc')
           ->get();
        return view('admin.transaksi', compact('pages', 'data'));
    }

    public function penumpang()
    {
      $data = DB::table('transaksi')
                  ->join('users', 'transaksi.id_pemesan', 'users.id')
                  ->where('status_bayar', 'dibayar')->get();
      // $data = Penumpang::where('status_bayar', 'dibayar')->get();

      return view('admin.penumpang', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit($id)
    {
      $data = Penumpang::find($id);
      if ($data == null) {
          // User not found, show 404 or whatever you want to do
          // example:
          return View('admin.trs.edit_trs', [], 404);
      } else {
          return View('admin.trs.edit_trs', compact('data'));
      }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $penumpang = Penumpang::findOrFail($id);
      //
      // $penumpang->status_bayar = $request->status_bayar;
      // $penumpang->nama = $request->nama;
      // $penumpang->no_ktp = $request->no_ktp;
      // $penumpang->no_hp = $request->no_hp;
      // $penumpang->alamat = '';
      // $penumpang->save();

      $pnpmng = Penumpang::where('id_transaksi', $penumpang->id_transaksi)->update([
        'status_bayar' => $request->status_bayar,
        'nama' => $request->nama,
        'no_ktp' => $request->no_ktp,
        'no_hp' => $request->no_hp,
        'alamat' => '',
        'updated_at' => Carbon::now()
      ]);

      $trs = Transaksi::where('id_transaksi', $penumpang->id_transaksi)->update(['status_bayar' => $request->status_bayar]);

      return \Redirect::to(route('admin-transaksi'))->with('success', 'Data Transaksi berhasil dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $penumpang = Penumpang::findOrFail($id);

      $penumpang->delete();

      return \Redirect::to(route('admin-transaksi'));
    }

    public function downloadPDF($id){
      // $user = Penumpang::find($id);
      $user = DB::table('penumpang')
                            ->join('perjalanan', 'penumpang.id_perjalanan', '=', 'perjalanan.id_perjalanan')
                            ->join('kapal', 'perjalanan.id_kapal', '=', 'kapal.id_kapal')
                            ->where('id_penumpang', $id)
                            ->get();

      $pdf = PDF::loadView('pdf', compact('user'));
      return $pdf->download('tiket'. $id .'.pdf');
    }

    public function sendEmailTiket(Request $request)
    {
      $user = DB::table('penumpang')
                            ->join('transaksi', 'penumpang.id_transaksi', '=', 'transaksi.id_transaksi')
                            ->join('perjalanan', 'penumpang.id_perjalanan', '=', 'perjalanan.id_perjalanan')
                            // ->join('destinasi', 'perjalanan.id_asal', '=', 'destinasi.id_destinasi')
                            ->join('kapal', 'perjalanan.id_kapal', '=', 'kapal.id_kapal')
                            ->where('penumpang.id_transaksi', $request->id_transaksi)
                            ->get();

      $dest = Destinasi::all();

      $email_cust = DB::table('transaksi')->select('email_order')->where('id_transaksi',  $request->id_transaksi)->get();
      $email_cust = $email_cust[0]->email_order;


      $data = array(
        "user" => $user,
        "dest" => $dest,
      );

      Mail::send('admin.trs.mail-booking', $data, function($message) use ($email_cust) {
          $message->to($email_cust)
                  ->subject('Booking Code');
          $message->from('info@jtindonesia.com','JTIndonesia');
      });

      Mail::send('admin.trs.mail-booking-agen', $data, function($message) {
          $message->to('iwayan.jtindonesia@gmail.com')
                  ->subject('Booking Code');
          $message->from('info@jtindonesia.com','JTIndonesia');
      });

      // return view('admin.trs.mail-booking', compact('user', 'dest'));
      //

      // return " <script type='text/javascript'>
      //  $.jGrowl('A message that will live a little longer.'', { life: 10000 });
      //  </script>";

      $trs = Transaksi::where('id_transaksi', '=', $request->id_transaksi)->update(['sta_booking_email' => 1, 'c_booking_email' => Carbon::now()]);

      return \Redirect::to(route('trs-penumpang'))->with('success', "Email sudah di kirim!");
    }

    public function view_kapal() {

      $data = Kapal::all();

      return view('admin.kapal', compact('data'));
    }

    public function form_kapal() {
      return view('admin.kapal-form');
    }

    public function add_kapal(Request $request) {
      $validator = Validator::make($request->all(), [
            'alias_kapal' => 'required|max:10',
            'nama_kapal' => 'required|max:50|regex:/^[a-zA-Z0-9]+$/u',
        ]);

      // $validatedData = $request->validate([
      //         'alias_kapal' => 'required|max:10',
      //         'nama_kapal' => 'required|max:50|regex:/^[a-zA-Z0-9]+$/u',
      //     ]);

      if ($validator->fails()) {
           return redirect('/kapal/add')
                       ->withErrors($validator)
                       ->withInput($request->all());
       }

       $insert_kapal = Kapal::create([
         'nama_kapal' => $request->nama_kapal,
         'alias_kapal' => $request->alias_kapal,
         'kapasitas' => $request->kapasitas,
         'id_nakhoda' => 1,
         'kelas' => 'Ekonomi',
         'updated_at' => Carbon::now(),
         'created_at' => Carbon::now()
       ]);

       $data = Kapal::all();

       $with = [
         'success' => 'Kapal berhasil ditambahkan',
         'data' => $data
       ];

       return \Redirect::to(route('kapal'))->with($with);
    }

    public function edit_form_kapal($id) {
      $data = Kapal::where( 'id_kapal', $id)->first();

      if ($data == null) {
        return view('admin.kapal');
      }
      else {
        return view('admin.kapal-form-edit', compact('data'));
      }
    }

    public function proses_edit_form_kapal(Request $request) {
      $data = DB::table('kapal')->where('id_kapal', $request->id_kapal)->update([
        'nama_kapal' => $request->nama_kapal,
        'kapasitas' => $request->kapasitas,
        'alias_kapal' => $request->alias_kapal,
        'created_at' => Carbon::now()
      ]);

      $validator = Validator::make($request->all(), [
        'alias_kapal' => 'required|max:10',
        'nama_kapal' => 'required|max:50|regex:/^[a-zA-Z0-9]+$/u',
      ]);

      if ($validator->fails()) {
        return redirect('/kapal/edit/'.$id)
        ->withErrors($validator)
        ->withInput($request->all());
      }

      return \Redirect::to(route('kapal'))->with('success', 'Data kapal berhasil diupdate');

    }


    public function destroy_kapal($id) {
      $data = DB::table('kapal')->where('id_kapal', $id);
      $data->delete();

      return \Redirect::to(route('kapal'))->with('delete', 'Data kapal sudah dihapus');

    }


    public function lap_trs(){
      $s_tgl = null;
      $e_tgl = null;
      $data = DB::table('penumpang AS p')
         ->join('transaksi', 'p.id_transaksi', 'transaksi.id_transaksi')
         ->join('perjalanan', 'p.id_perjalanan', 'perjalanan.id_perjalanan')
         ->select(['transaksi.no_transaksi AS no_trans', 'id_penumpang', 'p.nama as nm_penumpang', 'no_hp', 'no_ktp', 'harga', 'departure',
                    'p.status_bayar', 'batas_pembayaran', 'p.id_perjalanan', 'transaksi.created_at', 'transaksi.updated_at'])
         ->orderBy('transaksi.id_transaksi', 'desc')
         ->get();

      return view('admin.lap-trs', compact('data', 's_tgl', 'e_tgl'));
    }

    public function lap_trs_search(Request $request){
      $s_tgl = $request->s_tgl;
      $e_tgl = $request->e_tgl;
      $data = DB::table('penumpang AS p')
         ->join('transaksi', 'p.id_transaksi', 'transaksi.id_transaksi')
         ->join('perjalanan', 'p.id_perjalanan', 'perjalanan.id_perjalanan')
         ->select(['transaksi.no_transaksi AS no_trans', 'id_penumpang', 'p.nama as nm_penumpang', 'no_hp', 'no_ktp', 'harga', 'departure',
                    'p.status_bayar', 'batas_pembayaran', 'p.id_perjalanan', 'transaksi.created_at', 'transaksi.updated_at'])
         ->orderBy('transaksi.id_transaksi', 'desc')
         ->where('transaksi.created_at', '>',$s_tgl)
        ->where('transaksi.created_at', '<', $e_tgl)
         ->get();

      return view('admin.lap-trs', compact('data', 's_tgl', 'e_tgl'));
    }

    public function test_admin(){
      return view('admin.test-admin');
    }



}
