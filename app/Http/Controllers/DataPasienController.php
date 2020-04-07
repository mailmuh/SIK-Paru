<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DataPasien;
use App\Models\DataObat;
use App\Models\DataPenyakit;

class DataPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datapasiens = DataPasien::latest()->get();
        $dataobats = DataObat::all();
        $datapenyakits = DataPenyakit::all();
        return view('klinik.pasien.index', compact('datapasiens', 'dataobats', 'datapenyakits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataobats = DataObat::all();
        $datapenyakits = DataPenyakit::all();
        return view('klinik.pasien.create', compact('dataobats', 'datapenyakits'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datapasien = DataPasien::create([
            'nama_pasien' => $request->input('nama_pasien'),
            'ttl' => $request->input('ttl'),
            'umur' => $request->input('umur'),
            'jk' => $request->input('jk'),
            'alamat' => $request->input('alamat'),
            'tgl_datang' => $request->input('tgl_datang'),
            'gejala' => $request->input('gejala'),
            'penyakit_id' => $request->input('penyakit_id'),
            'obat_id' => $request->input('obat_id')
        ]);

        return redirect(route('datapasiens.index'));
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
    public function edit(DataPasien $datapasien)
    {
        $dataobats = DataObat::all();
        $datapenyakits = DataPenyakit::all();
        return view('klinik.pasien.edit', compact('datapasien', 'datapenyakits', 'dataobats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataPasien $datapasien)
    {
        $datapasien = DataPasien::whereid_pasien($datapasien->id_pasien)->update([
            'nama_pasien' => $request->input('nama_pasien'),
            'ttl' => $request->input('ttl'),
            'umur' => $request->input('umur'),
            'jk' => $request->input('jk'),
            'alamat' => $request->input('alamat'),
            'tgl_datang' => $request->input('tgl_datang'),
            'gejala' => $request->input('gejala'),
            'penyakit_id' => $request->input('penyakit_id'),
            'obat_id' => $request->input('obat_id')
        ]);

        return redirect(route('datapasiens.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pasien)
    {
        $datapasien = DataPasien::find($id_pasien);
        $datapasien->delete();

        return redirect(route('datapasiens.index'));
    }
}
