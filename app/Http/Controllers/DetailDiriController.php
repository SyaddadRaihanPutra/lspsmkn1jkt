<?php

namespace App\Http\Controllers;

use App\Models\Asesi;
use App\Models\Asesor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailDiriController extends Controller
{
    public function detaildiri()
    {
        if (Auth::user()->role == "2") {
            $role = "Asesor";
            $sekolah = DB::table('sekolah')->get();
            $jurusan = DB::table('jurusan')->get();
            $userEmail = Auth::user()->email;
            $asesorData = Asesor::where('email', $userEmail)->first();
            return view('asesor.detaildiri', compact('role', 'asesorData', 'sekolah', 'jurusan'));
        }

        if (Auth::user()->role == "3") {
            $role = "Asesi";
            $sekolah = DB::table('sekolah')->get();
            $jurusan = DB::table('jurusan')->get();
            $userEmail = Auth::user()->email;
            $asesiData = Asesi::where('email', $userEmail)->first();
            $jurusan_id = auth()->user()->jurusan_id;

            return view('asesi.detaildiri', compact('role', 'asesiData', 'sekolah', 'jurusan', 'jurusan_id'));
        }

    }
}
