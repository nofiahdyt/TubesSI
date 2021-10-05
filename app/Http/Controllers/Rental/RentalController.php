<?php

namespace App\Http\Controllers\Rental;

use App\Http\Controllers\Controller;
use App\Models\Rental;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RentalController extends Controller
{
    public function index()
    {
        $rental = DB::table('tb_rental')
        ->join('tb_kamera', 'tb_rental.id_kamera', '=', 'tb_kamera.id_kamera')
        ->join('tb_type_kamera', 'tb_rental.id_type_kamera', '=', 'tb_type_kamera.id')
        ->join('tb_perlengkapan', 'tb_rental.id_perlengkapan', '=', 'tb_perlengkapan.id_perlengkapan')
        ->join('tb_kabupaten', 'tb_rental.id_kabupaten', '=', 'tb_kabupaten.id')
        ->join('tb_kecamatan', 'tb_rental.id_kecamatan', '=', 'tb_kecamatan.id_kecamatan')
        ->join('tb_kelurahan', 'tb_rental.id_kelurahan', '=', 'tb_kelurahan.id')
        ->get();
        $kamera = DB::table('tb_kamera')->get();
        $type_kamera = DB::table('tb_type_kamera')->get();
        $perlengkapan = DB::table('tb_perlengkapan')->get();
        $kabupaten = DB::table('tb_kabupaten')->get();
        $kecamatan = DB::table('tb_kecamatan')->get();
        $kelurahan = DB::table('tb_kelurahan')->get();

        // dd($rental);

        return view('rental/rental',['rental' => $rental], ['data2' => $kamera], ['data3' => $type_kamera], ['data4' => $perlengkapan], ['data5' => $kabupaten], ['data6' => $kecamatan], ['data7' => $kelurahan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    // *
     // * Store a newly created resource in storage.
     // *
     // * @param  \Illuminate\Http\Request  
    // $request
     // * @return \Illuminate\Http\Response
     
    public function store(Request $request)
    {
        $this->_validation($request);

        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('/image/'), $imgName);
        Rental::create([
            "nama" => $request->nama,
            "id_kamera" => $request->id_kamera,
            "id_type_kamera" => $request->id_type_kamera,
            "id_perlengkapan" => $request->id_perlengkapan,
            "id_kabupaten" => $request->id_kabupaten,
            "id_kecamatan" => $request->id_kecamatan,
            "id_kelurahan" => $request->id_kelurahan,
            "longitude" => $request->longitude,
            "latitude" => $request->latitude,
            "latitude" => $request->latitude,
            "hari_buka" => $request->hari_buka,
            "jam_buka" => $request->jam_buka,
            "gambar" => $imgName
        ]);
        // dd($request->gambar);
        return redirect('/rental/rental');
    }

     private function _validation(Request $request){
        $validation = $request->validate([
            'gambar' => 'mimes:jpeg,png,jpg',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental, $id)
    {
        $rental = DB::table('tb_rental')->where('id_rental',$id)->get();
        $kamera = DB::table('tb_kamera')->get();
        $type_kamera = DB::table('tb_type_kamera')->get();
        $perlengkapan = DB::table('tb_perlengkapan')->get();
        $kabupaten = DB::table('tb_kabupaten')->get();
        $kecamatan = DB::table('tb_kecamatan')->get();
        $kelurahan = DB::table('tb_kelurahan')->get();
        return view('rental.rental-edit', ['rental'=>$rental],['data2' => $kamera], ['data3' => $type_kamera], ['data4' => $perlengkapan], ['data5' => $kabupaten], ['data6' => $kecamatan], ['data7' => $kelurahan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->_validation($request);
        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('/image/'), $imgName);
        Rental::where('id_rental', $id)->update([
            "nama" => $request->nama,
            "id_kamera" => $request->id_kamera,
            "id_type_kamera" => $request->id_type_kamera,
            "id_perlengkapan" => $request->id_perlengkapan,
            "id_kabupaten" => $request->id_kabupaten,
            "id_kecamatan" => $request->id_kecamatan,
            "id_kelurahan" => $request->id_kelurahan,
            "longitude" => $request->longitude,
            "latitude" => $request->latitude,
            "hari_buka" => $request->hari_buka,
            "jam_buka" => $request->jam_buka,
            "gambar" => $imgName
        ]);
        return redirect('/rental/rental');
        // dd($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tb_rental')->where('id_rental',$id)->delete();
        return redirect()->route('rental.index');
    }
}
