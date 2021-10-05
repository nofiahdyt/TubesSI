<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $table = 'tb_kabupaten';
    protected $fillable = ['nama_kabupaten'];

    public function Kecamatan()
	{
		return $this->hasMany('\App\Models\Kecamatan','id_kabupaten');
	}
}
