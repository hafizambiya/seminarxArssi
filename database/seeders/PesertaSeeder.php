<?php

namespace Database\Seeders;

use App\Models\Peserta;
use Faker\Factory as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PesertaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 100; $i++) {
            // $gender = $faker->randomElement(['L', 'P']);
            // $idPeserta = str_pad($i, 3, '0', STR_PAD_LEFT);
            Peserta::create([
                'idpeserta' => $faker->unique()->regexify('^[A-Z]{3}\d{3}$'),
                'idpesanan' => $faker->unique()->regexify('^[A-Z]{3}\d{3}$'),
                'nama_peserta' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'no_hp' => $faker->phoneNumber,
                'jabatan' => $faker->jobTitle,
                'instansi' => $faker->company,
                'email_instansi' => $faker->companyEmail,
                'alamat_instansi' => $faker->address,
                'no_telp_instansi' => $faker->phoneNumber,
                'nama_pendaftar' => $faker->name,
                'no_hp_pendaftar' => $faker->phoneNumber,
                'seminar' => $faker->boolean,
                'workshop' => $faker->numberBetween(0, 6),
                'pembelian' => $faker->sentence,
                'pelunasan' => '0',
                'password' => Hash::make('password'),
                'snaptoken' => null,
                'role' => 'user',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),

            ]);
        }
    }
}
