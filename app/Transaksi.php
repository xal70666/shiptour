<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  protected $table = 'transaksi';

  protected $fillable =[
    'no_transaksi',
    'tgl_pesan',
    'id_pemesan',
    'ket',
  ];

  public function transaksi_dtl(){
    return $this->hasMany('App\TransaksiDetail', 'id_transaksi');
  }
}
