<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    public function cetakrental(){
        $data=DB::table('tb_rental')
        ->join('tb_kamera', 'tb_rental.id_kamera', '=', 'tb_kamera.id_kamera')
        ->join('tb_type_kamera', 'tb_rental.id_type_kamera', '=', 'tb_type_kamera.id')
        ->join('tb_perlengkapan', 'tb_rental.id_perlengkapan', '=', 'tb_perlengkapan.id_perlengkapan')
        ->join('tb_kabupaten', 'tb_rental.id_kabupaten', '=', 'tb_kabupaten.id')
        ->join('tb_kecamatan', 'tb_rental.id_kecamatan', '=', 'tb_kecamatan.id_kecamatan')
        ->join('tb_kelurahan', 'tb_rental.id_kelurahan', '=', 'tb_kelurahan.id')
        ->get();
        $pdf = PDF::loadView('cetak.rental', ['rental'=>$data]);
        return $pdf->download('rental.pdf');
    }
}
