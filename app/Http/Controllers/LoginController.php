<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('main.login');
    }

    public function proses(Request $request){
        $request->validate([
            'email' =>'required',
            'password' =>'required'
        ]);

        $data =[
            'email' => $request->email,
            'password' => $request->password,
        ];

        $validasi = Auth::attempt($data);
        if($validasi){
            return redirect()->intended('peserta');
        }else {
            return redirect()->route('login')->with('failed','email atau password salah');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
