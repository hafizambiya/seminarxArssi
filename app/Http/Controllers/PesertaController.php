<?php

namespace App\Http\Controllers;

use App\Models\peserta;
use App\Http\Requests\StorepesertaRequest;
use App\Http\Requests\UpdatepesertaRequest;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('main.registrasi');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepesertaRequest $request)
    {
        $seminar = $request->seminar;
        $workshop = $request->workshop;
        $id_prefix = '';
        $harga = '';

        if ($seminar && $workshop) {
            $harga = 4000000;
        } elseif (!$seminar && $workshop) {
            $harga = 2000000;
        } elseif ($seminar && !$workshop) {
            $harga = 3000000;
        }

        // menentukan prefix sesuai dengan jenis kegiatan yang diikuti
        if ($seminar && !$workshop) {
            $id_prefix = 'S';
        } elseif (!$seminar && $workshop == 1) {
            $id_prefix = 'W1';
        } elseif (!$seminar && $workshop == 2) {
            $id_prefix = 'W2';
        } elseif (!$seminar && $workshop == 3) {
            $id_prefix = 'W3';
        } elseif (!$seminar && $workshop == 4) {
            $id_prefix = 'W4';
        } elseif (!$seminar && $workshop == 5) {
            $id_prefix = 'W5';
        } elseif (!$seminar && $workshop == 6) {
            $id_prefix = 'W6';
        } elseif ($seminar && $workshop == 1) {
            $id_prefix = 'SW1';
        } elseif ($seminar && $workshop == 2) {
            $id_prefix = 'SW2';
        } elseif ($seminar && $workshop == 3) {
            $id_prefix = 'SW3';
        } elseif ($seminar && $workshop == 4) {
            $id_prefix = 'SW4';
        } elseif ($seminar && $workshop == 5) {
            $id_prefix = 'SW5';
        } elseif ($seminar && $workshop == 6) {
            $id_prefix = 'SW6';
        }

        // mendapatkan nomor urut terakhir
        $last_peserta = Peserta::where('idpeserta', 'like', $id_prefix . '%')
            ->orderBy('idpeserta', 'desc')
            ->first();

        $nomor_urut = 1;
        if ($last_peserta) {
            $nomor_urut = substr($last_peserta->idpeserta, -5) + 1;
        }

        $nomor_urut_string = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);
        $idpeserta = $id_prefix . $nomor_urut_string;

        $peserta = new Peserta;
        $peserta->idpeserta = $idpeserta;
        $peserta->nama_peserta = $request->nama_p;
        $peserta->email = $request->email_p;
        $peserta->no_hp = $request->phone_p;
        $peserta->jabatan = $request->jabatan;
        $peserta->instansi = $request->instansi;
        $peserta->email_instansi = $request->email_instansi;
        $peserta->alamat_instansi = $request->alamat;
        $peserta->no_telp_instansi = $request->phone_instansi;
        $peserta->nama_pendaftar = $request->nama_pendaftar;
        $peserta->no_hp_pendaftar = $request->no_hp_pendaftar;
        $peserta->seminar = $request->seminar;
        $peserta->workshop = $request->workshop;
        $peserta->password = bcrypt($request->password);
        $peserta->pembelian = $harga;
        $peserta->pelunasan = 0;
        $peserta->save();

        return redirect('login')->with('msg', 'Berhasil menambahkan peserta');
    }

    /**
     * Display the specified resource.
     */
    public function show(peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(peserta $peserta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepesertaRequest $request, peserta $peserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(peserta $peserta)
    {
        //
    }
}
