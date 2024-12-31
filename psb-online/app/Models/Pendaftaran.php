<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'nama',
        'Alamat_KTP',
        'Alamat_lengkap',
        'kecamatan',
        'kabupaten_id',
        'provinsi_id',
        'nomor_telpon',
        'nomor_hp',
        'email',
        'kewarganegaraan',
        'tanggal_lahir',
        'tempat_lahir',
        'optional_tempat',
        'jenis_kelamin',
        'status_menikah',
        'agama_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class);
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }

    public function agama()
    {
        return $this->belongsTo(Agama::class);
    }
}
