<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataObat;
use App\Models\DataPenyakit;

class DataObatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapenyakits = DataPenyakit::all();
        $dataobats = DataObat::latest()->get();
        return view('klinik.obat.index', compact('dataobats', 'datapenyakits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $datapenyakits = DataPenyakit::all();
        return view('klinik.obat.create', compact('datapenyakits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dataobat = DataObat::create([
            'nama_obat' => $request->input('nama_obat'),
            'penyakit_id' => $request->input('penyakit_id')
        ]);

        return redirect(route('dataobats.index'));
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
    public function edit(DataObat $dataobat)
    {
        $datapenyakits = DataPenyakit::all();
        return view('klinik.obat.edit', compact('dataobat', 'datapenyakits'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataObat $dataobat)
    {
        $dataobat = DataObat::whereid_obat($dataobat->id_obat)->update([
            'nama_obat' => $request->input('nama_obat'),
            'penyakit_id' => $request->input('penyakit_id')
        ]);

        return redirect(route('dataobats.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_obat)
    {
        $dataobat = DataObat::find($id_obat);
        $dataobat->delete();

        return redirect(route('dataobats.index'));
    }
}
