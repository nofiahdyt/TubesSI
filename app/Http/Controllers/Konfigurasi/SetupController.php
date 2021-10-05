<?php

namespace App\Http\Controllers\Konfigurasi;

use App\Http\Controllers\Controller;
use App\Models\Setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SetupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_barang = DB::table('data_barang')->paginate(3);
        $setup = Setup::get();
        return view('konfigurasi/setup',['setup' => $setup]);
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
        // $setup = new Setup;
        // $setup->nama_aplikasi = $request->nama_aplikasi;
        // $setup->jumlah_hari_kerja = $request->jumlah_hari_kerja;
        // $setup->save();
        $this->_validation($request);
        Setup::create($request->all());
        return redirect()->back();
    }

     private function _validation(Request $request){
        $validation = $request->validate([
            'type_kamera' => 'required|max:100|min:3',
        ],
        [
            'type_kamera.required' => 'Harus diisi',
            'type_kamera.min' => 'Minimal 3 karakter',
            'type_kamera.max' => 'Maksimal 100 karakter'
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
    public function edit(Setup $setup, $id)
    {
        // $setup = Setup::find($id);
        $setup = DB::table('tb_type_kamera')->where('id',$id)->get();
        return view('konfigurasi.setup-edit', ['setup'=>$setup]);
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
        Setup::where('id', $id)->update(['type_kamera' => $request->type_kamera]);
        return redirect('/konfigurasi/setup');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Setup::destroy($id);
        return redirect()->route('setup.index');
    }
}
