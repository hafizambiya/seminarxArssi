<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class peserta extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;
    protected $table = 'pesertas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nama_peserta',
        'email',
        'no_hp',
        'nama_pendaftar',
        'no_hp_pendaftar',
        'jabatan_pendaftar',
        'instansi',
        'alamat_instansi',
        'no_telp_instansi',
        'seminar',
        'workshop',
        'password',
        'idpesanan'
    ];

    public static function getWorkshop($id)
    {
        $workshops = [
            1 => 'Workshop 1',
            2 => 'Workshop 2',
            3 => 'Workshop 3',
            4 => 'Workshop 4',
            5 => 'Workshop 5',
            6 => 'Workshop 6',
        ];

        return isset($workshops[$id]) ? $workshops[$id] : '';
    }

    protected function role(): Attribute
    {
        return new Attribute(
            get: fn ($value) => ["user", "admin"][$value],
        );
    }
}
