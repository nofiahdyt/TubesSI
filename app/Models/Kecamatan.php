<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'tb_kecamatan';
    protected $fillable = ['nama_kecamatan','id_kabupaten'];

    public function Divisi()
	{
		return $this->belongsTo('\App\Models\Divisi','id_kabupaten');
	}

	public function Kelurahan()
	{
		return $this->hasMany('\App\Models\Kelurahan','id_kecamatan');
	}
}
