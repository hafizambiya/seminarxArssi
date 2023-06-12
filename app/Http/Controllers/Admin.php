<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;
use App\Http\Requests\UpdatepesertaRequest;
use Illuminate\Support\Facades\DB;

class Admin extends Controller
{
    public function index()
    {
        $s = Peserta::where('seminar', true)
            ->where('workshop', null)
            ->count();


        $w1 = Peserta::where('seminar', false)
            ->where('workshop', '1')
            ->count();


        $w2 = Peserta::where('seminar', false)
            ->where('workshop', '2')
            ->count();

        $w3 = Peserta::where('seminar', false)
            ->where('workshop', '3')
            ->count();


        $w4 = Peserta::where('seminar', false)
            ->where('workshop', '4')
            ->count();

        $w5 = Peserta::where('seminar', false)
            ->where('workshop', '5')
            ->count();


        $w6 = Peserta::where('seminar', false)
            ->where('workshop', '6')
            ->count();

        $sw1 = Peserta::where('seminar', true)
            ->where('workshop', '1')
            ->count();


        $sw2 = Peserta::where('seminar', true)
            ->where('workshop', '2')
            ->count();

        $sw3 = Peserta::where('seminar', true)
            ->where('workshop', '3')
            ->count();


        $sw4 = Peserta::where('seminar', true)
            ->where('workshop', '4')
            ->count();

        $sw5 = Peserta::where('seminar', true)
            ->where('workshop', '5')
            ->count();


        $sw6 = Peserta::where('seminar', true)
            ->where('workshop', '6')
            ->count();




        // Lanjutkan perhitungan untuk workshop 3 sampai 6

        $peserta = Peserta::all();
        return view('main.admin')->with([
            'pesertas' => $peserta,
            's' => $s,
            'w1' => $w1,
            'w2' => $w2,
            'w3' => $w3,
            'w4' => $w4,
            'w3' => $w3,
            'w4' => $w4,
            'w5' => $w5,
            'w6' => $w6,
            'sw1' => $sw1,
            'sw2' => $sw2,
            'sw3' => $sw3,
            'sw4' => $sw4,
            'sw3' => $sw3,
            'sw4' => $sw4,
            'sw5' => $sw5,
            'sw6' => $sw6,

        ]);
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

        return redirect('admin/' . $idpeserta)->with('msg', 'Berhasil mengedit peserta' . ' ' . $data->fullname);
    }

    public function destroy($idpeserta)
    {
        $data = Peserta::where('idpeserta', $idpeserta)->first();
        $data->delete();
        return redirect('admin')->with('msg', 'Data ' . ' ' . $data->nama_peserta . ' ' . 'berhasil dihapus ');
    }

    public function costumpembayaran()
    {
        return view('main.costumpembayaran');
    }
}
