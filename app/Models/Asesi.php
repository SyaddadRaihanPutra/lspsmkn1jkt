<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asesi extends Model
{
    use HasFactory;
    protected $table = 'asesi';
    protected $primarykey = 'id_asesi';
    protected $guarded = [];
}
