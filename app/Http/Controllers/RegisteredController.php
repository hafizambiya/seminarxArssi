<?php

namespace App\Http\Controllers;

use App\Models\Peserta;

use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    public function index()
    {
        return view('main.peserta')->with('peserta', Peserta::all());
    }
}
