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
        return view('index', compact('destinasi'));
    }

    public function search(Request $request) {
      $from = $request->from;
      $to = $request->to;
      $tgl_berangkat = $request->departure;

      return view('hasil');
    }
}
