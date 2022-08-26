<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

use App\Exports\PegawaiExport;
use App\Imports\PegawaiImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

use App\Http\Requests\PegawaiRequest;
class Pegawaicontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
            // $datas = Pegawai::all();
        $datas = Pegawai::where('nama', 'LIKE', '%'.$keyword.'%')
        ->orwhere('gelar','LIKE', '%'.$keyword.'%')
        ->orwhere('nip','LIKE', '%'.$keyword.'%')
        ->paginate();
        return view('pegawai.index', compact(
        'datas','keyword'
       ));
        
    }

    public function cetakPegawai(Request $request)
    {
        $keyword = $request->keyword;
            // $datas = Pegawai::all();
        $datas = Pegawai::where('nama', 'LIKE', '%'.$keyword.'%')
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
        $model = new Pegawai;
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
        $model = new Pegawai;
        $model->nama = $request->nama;
        $model->tanggal_lahir = $request->tanggal_lahir;
        $model->gelar = $request->gelar;
        $model->nip = $request->nip;
        $model->save();

        return redirect('pegawai')->with('success', "Data berhasil disimpan");
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
    public function edit($id)
    {
        $model = Pegawai::find($id);
        return view('pegawai.edit',compact('model'
    ));
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
        $model = Pegawai::find($id);
        $model->nama = $request->nama;
        $model->tanggal_lahir = $request->date;
        $model->gelar = $request->gelar;
        $model->nip = $request->nip;
        $model->save();

        return redirect('pegawai')->with('success', "Data berhasil diperbaharui");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Pegawai::find($id);
        $model->delete();
        return redirect('pegawai');
    }
}
