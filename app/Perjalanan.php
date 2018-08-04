<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Perjalanan extends Model
{
    protected $table = 'perjalanan';

    protected $primaryKey = ['id_asal', 'id_tujuan'];

    protected $fillable =[
      'id_kapal',
      'id_asal',
      'id_tujuan',
    ];


    public function destinasi(){
      return $this->belongsTo('App\Destinasi', 'id_destinasi');
    }

    public function kapal(){
      return $this->belongsTo('App\Kapal', 'id_kapal');
    }

    public function transaksi_dtl(){
      return $this->hasOne('App\TransaksiDetail', 'id_perjalanan');
    }
}
