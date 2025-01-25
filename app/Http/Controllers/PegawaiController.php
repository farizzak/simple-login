<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TPegawai;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use Datatables;
use App\Http\Controllers\Controller;

use App\Http\Requests\PegawaiRequest;
class Pegawaicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $results['pegawai'] = TPegawai::all();
        return view('pegawai.index',$results);
    }

    public function datatablePegawai(Request $request)
    {
        
        return Datatables::of(TPegawai::orderBy('id', 'desc')->get())->addIndexColumn()->make(true);
    }

    public function cetakPegawai(Request $request)
    {
        $keyword = $request->keyword;
            // $datas = Pegawai::all();
        $datas = TPegawai::where('nama', 'LIKE', '%'.$keyword.'%')
        ->orwhere('gelar','LIKE', '%'.$keyword.'%')
        ->orwhere('nip','LIKE', '%'.$keyword.'%')
        ->paginate();
        return view('pegawai.Cetak-pegawai', compact(
        'datas','keyword'
       ));
        
    }


    public function pegawaiexport()
    {  
        
        return Excel::download(new PegawaiExport,'pegawai.xlsx');
    }

    public function pegawaiimportexcel(Request $request)
    {  
        $file = $request->file('file');
        $namaFile = $file->getClientOriginalName();
        $file->move ('DataPegawai', $namaFile);
    
        Excel::import(new PegawaiImport,public_path('/DataPegawai'.$namaFile));
        return redirect('pegawai');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pegawai = new TPegawai;
        return view('pegawai.create',compact('model'
    ));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PegawaiRequest $request)
    {
       $request->validate([
        'tanggal_lahir'=>'required'
       ]);
        $pegawai = new TPegawai;
        $pegawai->nama = $request->nama;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->gelar = $request->gelar;
        $pegawai->nip = $request->nip;
        $pegawai->save();

        return redirect('pegawai')->with('success', "Data Pegawai berhasil disimpan");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pegawai = TPegawai::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $results['pegawai'] = TPegawai::findOrFail($id);
        return view('pegawai.edit',$results);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PegawaiRequest $request, $id)
    {
        $request->validate([
            'tanggal_lahir'=>'required'
           ]);
        $pegawai = TPegawai::find($id);
        $pegawai->nama = $request->nama;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->gelar = $request->gelar;
        $pegawai->nip = $request->nip;
        // dd($pegawai);
        $pegawai->save();

        return redirect('pegawai')->with('success', "Data Pegawai berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = TPegawai::find($id);
        $pegawai->delete();
        return redirect('/pegawai')->with('success', 'owner deleted!');
    }
}
