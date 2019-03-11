<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Snorkeling extends Model
{
  protected $table = 'snorkeling';
  protected $primaryKey = 'id_snorkeling';

  protected $fillable =[
    'no_ktp',
    'nama',
    'alamat',
    'umur',
    'type',
  ];

}
