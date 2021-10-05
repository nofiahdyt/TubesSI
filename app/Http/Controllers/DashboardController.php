<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(){
        $data1 = DB::table('tb_kamera')->count();
        $data2 = DB::table('tb_type_kamera')->count();
        $data4 = DB::table('tb_perlengkapan')->count();
        $data5 = DB::table('tb_kabupaten')->count();
        $data6 = DB::table('tb_kecamatan')->count();
        $data7 = DB::table('tb_kelurahan')->count();
        $data8 = DB::table('tb_rental')->count();

        return view('index',['data1' => $data1], ['data2' => $data2], ['data4' => $data4], ['data5' => $data5], ['data6' => $data6], ['data7' => $data7], ['data8' => $data8]);
    }
}
