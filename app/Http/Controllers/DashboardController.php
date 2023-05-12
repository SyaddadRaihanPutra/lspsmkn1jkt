<?php

namespace App\Http\Controllers;

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
            $users = Student::all();
            $count = DB::table('students')->count();
            $jurusan = Jurusan::all();
            $countjurusan = DB::table('jurusan')->count();
            return view('admin.dashboard', compact('role', 'users', 'count', 'countjurusan', 'setting')); //ROLE ADMIN
        }
        if ($role == '2') {
            $role = "Guru";
            $users = Student::all();
            return view('guru.dashboard', compact('users', 'role', 'setting')); //ROLE ADMIN
        }
        if ($role == '3') {
            $role = "Ketua Kelas";
            $kelas_id = auth()->user()->kelas_id;
            $jurusan_id = auth()->user()->jurusan_id;

            if ($request->has('search')) {
                $students = Student::where('name', 'LIKE', '%' . $request->search . '%')
                    ->where('kelas_id', $kelas_id)
                    ->where('jurusan_id', $jurusan_id)
                    ->get();
            } else {
                $students = DB::table('students')
                    ->where('kelas_id', $kelas_id)
                    ->where('jurusan_id', $jurusan_id)
                    ->get();
            }

            $studentCount = DB::table('students')
                ->where('kelas_id', $kelas_id)
                ->where('jurusan_id', $jurusan_id)
                ->count();

            return view('ketuakelas.dashboard', compact('students', 'role', 'studentCount')); //ROLE KETUA KELAS
        }
        if ($role == '4') {
            return view('walikelas.dashboard'); //ROLE WALI KELAS
        }
    }
}
