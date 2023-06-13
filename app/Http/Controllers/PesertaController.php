<?php

namespace App\Http\Controllers;

use App\Models\peserta as Peserta;
use Illuminate\Http\Request;
use App\Mail\RegistrasiBerhasil;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\StorepesertaRequest;
use App\Http\Requests\UpdatepesertaRequest;

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
            $harga = 4500000;
        } elseif (!$seminar && $workshop) {
            $harga = 2750000;
        } elseif ($seminar && !$workshop) {
            $harga = 3750000;
        }

        // menentukan prefix sesuai dengan jenis kegiatan yang diikuti
        if ($seminar && !$workshop) {
            $id_prefix = 'S0';
        } elseif (!$seminar && $workshop == 1) {
            $id_prefix = 'W01';
        } elseif (!$seminar && $workshop == 2) {
            $id_prefix = 'W02';
        } elseif (!$seminar && $workshop == 3) {
            $id_prefix = 'W03';
        } elseif (!$seminar && $workshop == 4) {
            $id_prefix = 'W04';
        } elseif (!$seminar && $workshop == 5) {
            $id_prefix = 'W05';
        } elseif (!$seminar && $workshop == 6) {
            $id_prefix = 'W06';
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
            $last_idpeserta = $last_peserta->idpeserta;
            $nomor_urut = intval(substr($last_idpeserta, -5)) + 1;
            // dd($last_peserta->email,$last_idpeserta,$last_peserta);
        }

        $nomor_urut_string = str_pad($nomor_urut, 5, '0', STR_PAD_LEFT);

        $idpeserta = $id_prefix . $nomor_urut_string;

        // $seminar = $request->seminar;
        // $workshop = $request->workshop;
        $id_prefix_p = '';
        $nomor_urut_p = 1;
        $increment = 1000;

        if ($seminar && !$workshop) {
            $id_prefix_p = '1';
        } elseif ($seminar && $workshop == 1) {
            $id_prefix_p = '11';
        } elseif ($seminar && $workshop == 2) {
            $id_prefix_p = '12';
        } elseif ($seminar && $workshop == 3) {
            $id_prefix_p = '13';
        } elseif ($seminar && $workshop == 4) {
            $id_prefix_p = '14';
        } elseif ($seminar && $workshop == 5) {
            $id_prefix_p = '15';
        } elseif ($seminar && $workshop == 6) {
            $id_prefix_p = '16';
        } elseif (!$seminar && $workshop == 1) {
            $id_prefix_p = '01';
        } elseif (!$seminar && $workshop == 2) {
            $id_prefix_p = '02';
        } elseif (!$seminar && $workshop == 3) {
            $id_prefix_p = '03';
        } elseif (!$seminar && $workshop == 4) {
            $id_prefix_p = '04';
        } elseif (!$seminar && $workshop == 5) {
            $id_prefix_p = '05';
        } elseif (!$seminar && $workshop == 6) {
            $id_prefix_p = '06';
        }

        // mendapatkan nomor urut terakhir
        $last_peserta_p = Peserta::where('idpeserta', 'like', $id_prefix . '%')
            ->orderBy('idpeserta', 'desc')
            ->first();

        if ($last_peserta_p) {
            $last_idpeserta = $last_peserta_p->idpeserta;
            $nomor_urut_p = intval(substr($last_idpeserta, -4)) + 1;
        }

        $nomor_urut_string_p = str_pad($nomor_urut_p, 2, '0', STR_PAD_LEFT);

        $idpeserta_p = $id_prefix_p . $nomor_urut_string_p + $increment;

        $peserta = new Peserta;

        $peserta->idpeserta = $idpeserta;
        $peserta->no_peserta = $idpeserta_p;
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
    public function edit($id)
    {
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

    public function registrasi_proses(Request $request)
    {
        $request->validate(
            [

                'nama_p' => 'required',
                'email_p' => 'required|email|unique:pesertas,email',
                'password' => 'required|confirmed',
                'phone_p' => 'required',
                'jabatan' => 'required',
                'instansi' => 'required',




                'nama_pendaftar' => 'required',
                'no_hp_pendaftar' => 'required',

            ],
            [
                'nama_p.required' => 'Nama peserta tidak boleh kosong',
                'email_p.required' => 'Email Peserta tidak boleh kosong',
                'password.required' => 'Password tidak boleh kosong',
                'jabatan.required' => 'Jabatan tidak boleh kosong',
                'instansi.required' => 'Instansi tidak boleh kosong',
                'phone_p.required' => 'No HP Peserta tidak boleh kosong',
                'email_p.unique' => 'Email sudah terdaftar',



                'nama_pendaftar.required' => 'Nama pendaftar tidak boleh kosong',
                'no_hp_pendaftar.required' => 'No Hp Pendaftar tidak boleh kosong',

            ]
        );

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
            $id_prefix = 'SEM';
        } elseif (!$seminar && $workshop == 1) {
            $id_prefix = 'WK1';
        } elseif (!$seminar && $workshop == 2) {
            $id_prefix = 'WK2';
        } elseif (!$seminar && $workshop == 3) {
            $id_prefix = 'WK3';
        } elseif (!$seminar && $workshop == 4) {
            $id_prefix = 'WK4';
        } elseif (!$seminar && $workshop == 5) {
            $id_prefix = 'WK5';
        } elseif (!$seminar && $workshop == 6) {
            $id_prefix = 'WK6';
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
            $last_idpeserta = $last_peserta->idpeserta;

            $nomor_urut = intval(substr($last_idpeserta, -3)) + 1;

            // dd($last_peserta->email,$last_idpeserta,$last_peserta);
        }

        $nomor_urut_string = str_pad($nomor_urut, 3, '0', STR_PAD_LEFT);



        $idpeserta = $id_prefix . $nomor_urut_string;

        $idpesanan = $idpeserta . '_' . date('mdHis');


        $peserta = new Peserta;
        $peserta->role = 'user';
        $peserta->idpeserta = $idpeserta;
        $peserta->idpesanan = $idpesanan;
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
        $peserta->pelunasan = "0";
        $peserta->save();
        Mail::to($peserta->email)->send(new RegistrasiBerhasil($peserta));
        return redirect('login')->with('status', 'Peserta berhasil didaftarkan silahkan login untuk melanjutkan pembayaran');
    }
}
