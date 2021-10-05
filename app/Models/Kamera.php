<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kamera extends Model
{
    protected $table = 'tb_kamera';
    protected $fillable = ['nama_kamera','id_type_kamera','stok','harga','gambar'];
}
