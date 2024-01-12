<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AsesorController extends Controller
{
    public function detaildiri()
    {
        $role = "Asesor";
        $sekolah = DB::table('sekolah')->get();
        $jurusan = DB::table('jurusan')->get();
        $userEmail = Auth::user()->email;
        $asesorData = Asesor::where('email', $userEmail)->first();
        return view('asesor.detaildiri', compact('role', 'asesorData', 'sekolah', 'jurusan'));
    }
}
