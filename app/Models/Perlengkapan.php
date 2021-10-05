<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Perlengkapan extends Model
{
    protected $table = 'tb_perlengkapan';
    protected $fillable = ['nama_perlengkapan','stok','harga','gambar'];
}
