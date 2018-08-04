<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
  protected $table = 'destinasi';

  protected $fillable =[
    'nama',
    'alamat',
  ];

  public function perjalanan(){
    return $this->hasOne('App\Perjalanan', ['id_asal', 'id_tujuan']);
  }
}
