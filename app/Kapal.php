<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kapal extends Model
{
  protected $table = 'kapal';

  protected $fillable =[
    'nama_kapal',
    'kelas',
    'alias_kapal',
    'kapasitas',
    'id_nakhoda',
  ];

  public function perjalanan(){
    return $this->hasOne('App\Perjalanan', 'id_kapal');
  }
}
