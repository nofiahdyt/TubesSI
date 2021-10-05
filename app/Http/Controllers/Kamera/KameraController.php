<?php

namespace App\Http\Controllers\Kamera;

use App\Http\Controllers\Controller;
use App\Models\Kamera;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use UploadFile;

class KameraController extends Controller
{
    public function index()
    {
        $kamera = DB::table('tb_kamera')
        ->join('tb_type_kamera', 'tb_kamera.id_type_kamera', '=', 'tb_type_kamera.id')->get();
        $type_kamera = DB::table('tb_type_kamera')->get();
        return view('kamera.kamera',['kamera' => $kamera], ['data3' => $type_kamera]);
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
        Kamera::create([
            "nama_kamera" => $request->nama_kamera,
            "id_type_kamera" => $request->id_type_kamera,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "gambar" => $imgName]);
        return redirect('/kamera/kamera');
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'nama_kamera' => 'required|max:100|min:3',
            'gambar' => 'mimes:jpeg,png,jpg',
        ],
        [
            'nama_kamera.required' => 'Harus diisi',
            'nama_kamera.min' => 'Minimal 3 karakter',
            'nama_kamera.max' => 'Maksimal 100 karakter'
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
    public function edit(Kamera $kamera, $id)
    {
        // dd($id);
        $setup = DB::table('tb_kamera')->where('id_kamera',$id)->get();
        $type_kamera = DB::table('tb_type_kamera')->get();
        return view('kamera.kamera-edit', ['kamera'=>$setup], ['data3' => $type_kamera]);
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
        // dd($request);
        $this->_validation($request);
        $imgName = $request->gambar->getClientOriginalName() . '-' . time() . '.' . $request->gambar->extension();
        $request->gambar->move(public_path('/image/'), $imgName);
        Kamera::where('id_kamera', $id)->update([
            'ID_kamera'=>$request->id,
            "nama_kamera" => $request->nama_kamera,
            "id_type_kamera" => $request->id_type_kamera,
            "stok" => $request->stok,
            "harga" => $request->harga,
            "gambar" => $imgName
        ]);
        return redirect('/kamera/kamera');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kamera::where('id_kamera',$id)->delete();
        return redirect()->route('kamera.index');
    }
}
