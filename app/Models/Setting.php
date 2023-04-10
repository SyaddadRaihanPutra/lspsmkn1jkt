<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = 'setting';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_sekolah',
        'nama_sekolah_long',
        'alamat_sekolah',
        'logo_sekolah',
        'url_web_sekolah',
    ];
}
