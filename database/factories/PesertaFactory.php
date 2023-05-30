<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\peserta>
 */
class PesertaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idpeserta' => 'ADM001',
            'idpesanan' => 'ORD001',
            'nama_peserta' => 'Admin',
            'email' => 'admin@example.com',
            'no_hp' => '081234567890',
            'jabatan' => 'Admin',
            'instansi' => 'Admin Institution',
            'email_instansi' => 'admin@example.com',
            'alamat_instansi' => 'Admin Institution Address',
            'no_telp_instansi' => '02112345678',
            'nama_pendaftar' => 'Admin Registrar',
            'no_hp_pendaftar' => '081234567891',
            'seminar' => false,
            'workshop' => null,
            'pembelian' => 'Dummy Purchase',
            'pelunasan' => false,
            'password' => Hash::make('adminpassword'),
            'snaptoken' => null,
            'role' => 'admin', // Role admin
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
