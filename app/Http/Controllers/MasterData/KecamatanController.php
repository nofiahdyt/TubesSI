<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = DB::table('tb_kecamatan')
        ->join('tb_kabupaten', 'tb_kecamatan.id_kabupaten', '=', 'tb_kabupaten.id')->get();
        $kabupaten = DB::table('tb_kabupaten')->get();
        return view('masterdata/kecamatan',['data' => $kecamatan], ['data2' => $kabupaten]);
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
        Kecamatan::create($request->all());
        return redirect()->back();
    }

    private function _validation(Request $request){
        $validation = $request->validate([
            'nama_kecamatan' => 'required|max:50|min:2',
        ],
        [
            'nama_kecamatan.required' => 'Harus diisi',
            'nama_kecamatan.min' => 'Minimal 2 karakter',
            'nama_kecamatan.max' => 'Maksimal 50 karakter'
        ]);

        // DB::table('tb_kecamatan')->insert([
        //     'nama_kecamatan'=>$request->nama_kecamatan,
        //     'id_kabupaten' =>$request->id_kabupaten
        // ]);
        // return redirect()->back();
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
    public function edit(Kecamatan $kecamatan, $id)
    {
        $kecamatan = DB::table('tb_kecamatan')->where('id_kecamatan',$id)->get();
        $kabupaten = DB::table('tb_kabupaten')->get();
        return view('masterdata.kecamatan-edit', ['kecamatan'=>$kecamatan], ['data2' => $kabupaten]);
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
        Kecamatan::where('id_kecamatan', $id)->update(['nama_kecamatan' => $request->nama_kecamatan, "id_kabupaten" => $request->id_kabupaten]);
        return redirect('/master-data/kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        DB::table('tb_kecamatan')->where('id_kecamatan',$id)->delete();
        return redirect()->route('kecamatan.index');
    }
}
