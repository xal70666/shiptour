<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
  protected $table = 'transaksi_dtl';

  protected $fillable =[
    'id_transaksi',
    'harga',
    'harga_total',
    'status_bayar',
    'departure',
    'arrival',
    'batas_pembayaran',
    'id_penumpang',
    'id_perjalanan',
  ];

  public function perjalanan(){
    return $this->hasOne('App\Perjalanan', 'id_kapal');
  }

  public function penumpang(){
    return $this->belongsToMany('App\Penumpang', 'id_penumpang');
  }

  public function transaksi(){
    return $this->belongsTo('App\Transaksi', 'id_transaksi');
  }

  // public function perjalanan(){
  //   return $this->belongsTo('App\Perjalanan', 'id_perjalanan');
  // }
}
