<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
  protected $table = 'transaksi_dtl';

  protected $fillable =[
    'id_transaksi',
    'id_penumpang',
    'id_perjalanan',
  ];

  public function perjalanan(){
    return $this->hasOne('App\Perjalanan', 'id_kapal');
  }

  public function penumpang(){
    return $this->belongsTo('App\Penumpang', 'id_penumpang');
  }

  public function transaksi(){
    return $this->belongsTo('App\Transaksi', 'id_transaksi');
  }

  public function perjalanan(){
    return $this->belongsTo('App\Perjalanan', 'id_perjalanan');
  }
}
