<?php

namespace App;
use App\TransaksiDetaill;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
  protected $table = 'penumpang';
  protected $primaryKey = 'id_penumpang';

  protected $fillable =[
    'no_ktp',
    'nama',
    'alamat',
    'umur',
    'type',
  ];

  public function penumpang(){
    // return $this->hasMany('App\TransaksiDetail', 'id_penumpang');
    return $this->hasMany(TransaksiDetail::class);
  }

  public function addTrsDtl($data)
  {
    return $this->penumpang()->insert([
      'id_penumpang' => $data[0]['id_penumpang'],
      'harga' =>  $data[0]['harga'],
      'harga_total' => 0,
      'id_transaksi' => $data[0]['id_transaksi'],
      'id_perjalanan' => $data[0]['id_perjalanan'],
      'created_at' => $data[0]['created_at'],
      'updated_at' => $data[0]['updated_at'],
      'status_bayar' => "menunggu",
      'departure' => $data[0]['departure'],
      'batas_pembayaran' => $data[0]['batas_pembayaran'],
    ]);
  }
}
