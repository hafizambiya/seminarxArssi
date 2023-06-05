<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\peserta;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        $order = $request->all();
        // dd($order);


        /*Install Midtrans PHP Library (https://github.com/Midtrans/midtrans-php)
composer require midtrans/midtrans-php

Alternatively, if you are not using **Composer**, you can download midtrans-php library
(https://github.com/Midtrans/midtrans-php/archive/master.zip), and then require
the file manually.

require_once dirname(__FILE__) . '/pathofproject/Midtrans.php'; */

        //SAMPLE REQUEST START HERE

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
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
                    'price' => 4400, // Harga produk atau barang
                    'quantity' => 1, // Jumlah produk atau barang yang dibeli
                    'name' => 'Biaya Transaksi', // Nama produk atau barang
                ),
            )
        );

        // dd($request->snaptoken);

        if (!empty($request->snaptoken)) {
            $snapToken = $request->snaptoken;
            return view('main.checkout', compact('snapToken', 'order'));
        } else {
            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $peserta = Peserta::where('idpesanan', $request->idpesanan)->first();
            // dd($peserta->snaptoken);

            $peserta->snaptoken = $snapToken;
            $peserta->save();
            return view('main.checkout', compact('snapToken', 'order'));
        }
    }

    public function callback(Request $request)
    {

        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512", $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture') {
                $order = Peserta::where('idpesanan', $request->order_id)->first();
                // dd($order);
                // $order->update(['pelunasan' => 1]);
                $order->pelunasan = 'lunas';
                $order->save();
                return view('main.peserta');
            }
        }
    }

    public function invoice()
    {
        // $order = Peserta::find($id);
        return view('main.peserta');
    }
}
