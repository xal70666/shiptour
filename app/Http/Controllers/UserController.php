<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function userOrder() {
      $user = User::where('id',Auth::user()->id)->get();
      $transaksi =  Transaksi::where('id_pemesan', Auth::user()->id)->get();

      $data_status_snorkeling = DB::table('transaksi')
                            ->join('snorkeling', 'transaksi.id_transaksi', '=', 'snorkeling.id_transaksi')
                            // ->join('destinasi', 'perjalanan.id_asal', '=', 'destinasi.id_destinasi')
                            // ->where('no_transaksi', $no_trs)
                            ->get();

      $trs_penumpang = DB::table('transaksi')
                                         ->join('penumpang', 'penumpang.id_transaksi', 'transaksi.id_transaksi')
                                         ->join('perjalanan', 'perjalanan.id_perjalanan', 'penumpang.id_perjalanan')
                                         ->join('kapal', 'perjalanan.id_kapal', '=', 'kapal.id_kapal')
                                         // ->join('destinasi', 'perjalanan.id_asal', '=', 'destinasi.id_destinasi')
                                         ->where(
                                           'id_pemesan', Auth::user()->id)
                                        ->get();

                                         // ->get(
                                         //   array(
                                         //     'transaksi.no_transaksi',
                                         //     'transaksi.id_transaksi',
                                         //     'transaksi.tgl_pesan',
                                         //     'transaksi.status_bayar',
                                         //     'destinasi.nama as nm_destinasi',
                                         //     'penumpang.harga',
                                         //     'penumpang.nama',
                                         //     'penumpang.no_ktp',
                                         //   )
                                         // );
                                         // dd($trs_penumpang);

      $destinasi = Destinasi::get();

      return view('myorder', compact('transaksi', 'trs_penumpang' , 'destinasi'));
    }
    public function userOrderDtl() {
      $user = User::where('id',Auth::user()->id)->get();
      $transaksi =  Transaksi::where('id_pemesan', Auth::user()->id)->get();
      $trs_penumpang = DB::table('transaksi')->join('penumpang', 'penumpang.id_transaksi', 'transaksi.id_transaksi')
                                         ->where('id_pemesan', Auth::user()->id)
                                         ->get();
      return view('myorder', compact('transaksi', 'trs_penumpang'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
