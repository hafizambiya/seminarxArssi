<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\peserta as Peserta;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $order = $request->all();

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        // dd($order);

        $params = array(
            'transaction_details' => array(
                'order_id' => $request->idpesanan,
                'gross_amount' => $request->pembelian + 4400,

            ),
            'customer_details' => array(
                'first_name' => $request->nama,
                'email' => $request->email,
            ),
            'item_details' => array(
                array(
                    'id' => $request->idacara,
                    'price' => $request->pembelian, // Harga produk atau barang
                    'quantity' => 1, // Jumlah produk atau barang yang dibeli
                    'name' => $request->acara, // Nama produk atau barang
                ),
                array(
                    'id' => 'fee transfer',
                    'price' => 4440, // Harga produk atau barang
                    'quantity' => 1, // Jumlah produk atau barang yang dibeli
                    'name' => 'Biaya Transaksi', // Nama produk atau barang
                ),
            ),
            'expiry' => array(
                'unit' => 'days',
                'duration' => 30,
            ),
        );

        // dd($request->snaptoken);
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        $peserta = Peserta::where('idpeserta', $request->idpeserta)->first();
        // dd($peserta->snaptoken);

        $peserta->snaptoken = $snapToken;
        $peserta->save();
        return view('main.checkout', compact('snapToken', 'order'));
    }

    public function callback(Request $request)
    {
        // dd(Auth::user()->role === 'user');

        $serverKey = config('midtrans.server_key');
        $order_id = substr($request->order_id, 0, -2);
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $order = Peserta::where('idpesanan', $order_id)->first();

                if ($order) {
                    $order->pelunasan = 'lunas';
                    $order->save();
                    // return view('main.peserta');
                } else {
                }
            }
        }
    }

    public function admincheckout(Request $request)
    {
        $order = $request->all();
        // dd($order);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = true;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;
        // dd($order);

        $params = array(
            'transaction_details' => array(
                'order_id' => $request->instansi,
                'gross_amount' => $request->pembelian + 4440,

            ),
            'customer_details' => array(
                'first_name' => $request->nama,
                'email' => $request->email,
            ),
            'item_details' => array(
                array(
                    'id' => $request->idacara,
                    'price' => $request->pembelian, // Harga produk atau barang
                    'quantity' => 1, // Jumlah produk atau barang yang dibeli
                    'name' => $request->acara, // Nama produk atau barang
                ),
                array(
                    'id' => 'fee transfer',
                    'price' => 4440, // Harga produk atau barang
                    'quantity' => 1, // Jumlah produk atau barang yang dibeli
                    'name' => 'Biaya Transaksi', // Nama produk atau barang
                ),
            ),
            'expiry' => array(
                'unit' => 'days',
                'duration' => 30,
            ),
        );

        // dd($request->snaptoken);
        $snapToken = \Midtrans\Snap::getSnapToken($params);

        return view('main.konfirmasi', compact('snapToken', 'order'));
    }
}
