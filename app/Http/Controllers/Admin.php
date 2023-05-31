<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatepesertaRequest;

class Admin extends Controller
{
    public function index()
    {
        $peserta = Peserta::all();
        return view('main.admin')->with(['pesertas' => $peserta]);
    }

    public function show(peserta $peserta, $idpeserta)
    {
        // dd($idpeserta);
        $data = Peserta::where('idpeserta', $idpeserta)->first();
        // dd($data);

        return view('main.edit')->with([
            'idpeserta' => $data->idpeserta,
            'nama' => $data->nama_peserta,
            'seminar' => $data->seminar,
            'workshop' => $data->workshop,
            'pelunasan' => $data->pelunasan,


        ]);
    }

    public function update(UpdatepesertaRequest $request, peserta $peserta, $idpeserta)
    {
        // $validated = $request->validated();

        $data = Peserta::where('idpeserta', $idpeserta)->first();
        $data->idpeserta = $request->idpeserta;
        $data->nama_peserta = $request->nama;
        $data->seminar = $request->seminar;
        $data->workshop = $request->workshop;
        $data->pelunasan = $request->pelunasan;
        $data->save();

        return redirect('admin')->with('msg', 'Berhasil mengedit peserta' . $data->fullname . 'berhasil diupdate ');
    }
}
