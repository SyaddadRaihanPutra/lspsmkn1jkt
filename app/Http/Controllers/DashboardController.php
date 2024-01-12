<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Jurusan;
use App\Models\Setting;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $role = Auth::user()->role;
        $setting = DB::table('setting')->get()->first();

        if ($role == '1') {
            $role = "Administrator";
            $jurusan = Jurusan::all();
            $countjurusan = DB::table('jurusan')->count();
            return view('admin.dashboard', compact('role', 'countjurusan', 'setting')); //ROLE ADMIN
        }
        if ($role == '2') {
            $role = "Asesor";
            $sekolah = DB::table('sekolah')->get();
            $jurusan = DB::table('jurusan')->get();
            $userEmail = Auth::user()->email;
            $asesorData = Asesor::where('email', $userEmail)->first();

            return view('asesor.dashboard', compact('role', 'asesorData', 'sekolah', 'jurusan')); //ROLE ASESOR
        }
        if ($role == '3') {
            $role = "Asesi";
            $jurusan_id = auth()->user()->jurusan_id;

            return view('asesi.dashboard', compact('role', 'jurusan_id')); //ROLE ASESI
        }
    }

}
