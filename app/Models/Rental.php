<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    protected $table = 'tb_rental';
    protected $fillable = ['nama','id_kamera','id_type_kamera','id_perlengkapan','id_kabupaten','id_kecamatan','id_kelurahan','longitude','latitude','hari_buka','jam_buka','gambar'];
}
