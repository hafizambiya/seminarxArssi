<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RegisteredController extends Controller
{
    public function index()
    {
        return view('main.peserta')->with(['user' => Auth::user(),]);
    }
}
