<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Divisi;
use Illuminate\Support\Facades\DB;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data_barang = DB::table('data_barang')->paginate(3);
        $data = Divisi::get();
        return view('masterdata/divisi',['data' => $data]);
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
        Divisi::create($request->all());
        return redirect()->back();
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'nama_kabupaten' => 'required|max:50|min:2',
        ],
        [
            'nama_kabupaten.required' => 'Harus diisi',
            'nama_kabupaten.min' => 'Minimal 2 karakter',
            'nama_kabupaten.max' => 'Maksimal 50 karakter'
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
    public function edit(Divisi $divisi, $id)
    {
        $divisi = DB::table('tb_kabupaten')->where('id',$id)->get();
        return view('masterdata.divisi-edit', ['divisi'=>$divisi]);
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
        Divisi::where('id', $id)->update(['nama_kabupaten' => $request->nama_kabupaten]);
        return redirect('/master-data/divisi');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Divisi::destroy($id);
        return redirect()->route('divisi.index');
    }
}
