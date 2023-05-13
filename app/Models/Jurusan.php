<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusan';
    protected $fillable = [
        'kelas_id',
        'nama_jurusan',
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
