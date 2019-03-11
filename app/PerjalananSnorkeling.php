<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PerjalananSnorkeling extends Model
{
  protected $table = 'perjalanan_snorkeling';

  protected $primaryKey = ['id_destinasi'];

  protected $fillable =[
    'id_kapal',
    'id_destinasi',
  ];


  public function destinasi(){
    return $this->belongsTo('App\Destinasi', 'id_destinasi');
  }

  public function kapal(){
    return $this->belongsTo('App\Kapal', 'id_kapal');
  }

}
