<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KelurahanController extends Controller
{
    public function index()
    {
        $kelurahan = DB::table('tb_kelurahan')
        ->join('tb_kecamatan', 'tb_kelurahan.id_kecamatan', '=', 'tb_kecamatan.id_kecamatan')->get();
        $kecamatan = DB::table('tb_kecamatan')->get();
        return view('masterdata/kelurahan',['data' => $kelurahan], ['data2' => $kecamatan]);
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
        Kelurahan::create($request->all());
        return redirect()->back();
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'nama_kelurahan' => 'required|max:50|min:2',
        ],
        [
            'nama_kelurahan.required' => 'Harus diisi',
            'nama_kelurahan.min' => 'Minimal 2 karakter',
            'nama_kelurahan.max' => 'Maksimal 50 karakter'
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
    public function edit(Kelurahan $kelurahan, $id)
    {
        $kelurahan = DB::table('tb_kelurahan')->where('id',$id)->get();
        $kecamatan = DB::table('tb_kecamatan')->get();
        return view('masterdata.kelurahan-edit', ['kelurahan'=>$kelurahan], ['data2' => $kecamatan]);
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
        Kelurahan::where('id', $id)->update(["nama_kelurahan" => $request->nama_kelurahan,
            "id_kecamatan" => $request->id_kecamatan]);
        return redirect('/master-data/kelurahan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kelurahan::destroy($id);
        return redirect()->route('kelurahan.index');
    }
}
