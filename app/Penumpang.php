<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
  protected $table = 'penumpang';

  protected $fillable =[
    'no_ktp',
    'nama',
    'alamat',
    'umur',
    'type',
  ];

  public function perjalanan(){
    return $this->hasOne('App\TransaksiDetail', 'id_penumpang');
  }
}
