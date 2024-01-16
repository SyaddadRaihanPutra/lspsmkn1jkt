<?php

namespace App\Http\Controllers;

use App\Models\Asesi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class APLController extends Controller
{
    public function apl1()
    {
        $role = "Asesi";
        $institusi = DB::table('sekolah')->get();
        $jurusan = DB::table('jurusan')->get();
        $userEmail = Auth::user()->email;
        $asesiData = Asesi::where('email', $userEmail)->first();
        return view('asesi.apl01', compact('role', 'institusi', 'jurusan', 'asesiData'));
    }
}
