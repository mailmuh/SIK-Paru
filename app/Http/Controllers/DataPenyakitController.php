<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPenyakit;

class DataPenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapenyakits = DataPenyakit::latest()->get();
        return view('klinik.penyakit.index', compact('datapenyakits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('klinik.penyakit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datapenyakit = DataPenyakit::create([
            'nama_penyakit' => $request->input('nama_penyakit'),
            'gejala' => $request->input('gejala')
            
        ]);

        return redirect(route('datapenyakits.index')); 
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
    public function edit(DataPenyakit $datapenyakit)
    {
        return view('klinik.penyakit.edit', compact('datapenyakit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPenyakit $datapenyakit)
    {
        $datapenyakit = DataPenyakit::whereid_penyakit($datapenyakit->id_penyakit)->update([
            'nama_penyakit' => $request->input('nama_penyakit'),
            'gejala' => $request->input('gejala')
        ]);

        return redirect(route('datapenyakits.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_penyakit)
    {
        $datapenyakit = DataPenyakit::find($id_penyakit);
        $datapenyakit->delete();

        return redirect(route('datapenyakits.index'));
    }
}
