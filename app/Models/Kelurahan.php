<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'tb_kelurahan';
    protected $fillable = ['nama_kelurahan','id_kecamatan'];

    public function Kecamatan()
	{
		return $this->belongsTo('\App\Models\Kecamatan','id_kecamatan');
	}
}
