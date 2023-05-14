<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use App\Models\Setting;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
    //FUNCTION KELAS

    public function master_kelas()
    {
        $role = "Administrator";
        $kelas = DB::table('kelas')->get();
        return view('admin.masterkelas', compact('kelas', 'role'));
    }

    public function master_kelas_create()
    {
        return view('admin.masterkelas')->with('success', 'Data berhasil disimpan.');
    }

    public function master_kelas_store(Request $request)
    {
        Kelas::create([
            'nama_kelas' => $request->kelas,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        if (!$kelas) {
            return redirect()->back()->with('error', 'Data not found');
        }
        $kelas->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    // FUNCTION JURUSAN

    public function master_jurusan(Request $request)
    {
        $role = "Administrator";
        $jurusan = DB::table('jurusan')->paginate(10);

        if ($request->has('search')) {
            $jurusan = Jurusan::where('nama_jurusan', 'LIKE', '%' . $request->search . '%')->paginate(10);
        } else {
            $jurusan = DB::table('jurusan')->paginate(10);
            if ($jurusan->isEmpty()) {
                return "Data Tidak Ditemukan";
            }
        }
        return view('admin.masterjurusan', compact('jurusan', 'role'));
    }

    public function master_jurusan_create()
    {
        return view('admin.masterjurusan')->with('success', 'Data berhasil disimpan.');
    }

    public function master_jurusan_store(Request $request)
    {
        Jurusan::create([
            'kelas_id' => $request->input('kelas_id'),
            'nama_jurusan' => $request->input('nama_jurusan'),
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function jurusan_destroy($id)
    {
        $jurusan = Jurusan::find($id);
        if (!$jurusan) {
            return redirect()->back()->with('error', 'Data not found');
        }
        $jurusan->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

    // FUNCTION SISWA

    public function master_user(Request $request)
    {
        $kelas_id = $request->input('kelas_id');
        $jurusan_id = $request->input('jurusan_id');
        $role = "Administrator";

        if ($request->has('search')) {
            $ketuakelas = User::where('name', 'LIKE', '%' . $request->search . '%')->whereNotNull('kelas_id')->paginate(10);
        } else {
            $ketuakelas = DB::table('users')->whereNotNull('kelas_id')->paginate(10);
            if ($ketuakelas->isEmpty()) {
                return "Data Tidak Ditemukan";
            }
        }


        // $students = DB::table('students')
        //     ->where('kelas_id', $kelas_id)
        //     ->where('jurusan_id', $jurusan_id)
        //     ->get();

        return view('admin.masterkk', compact('ketuakelas', 'role'));
    }

    public function master_user_create(Request $request)
    {
        return view('admin.masterkk');
    }

    public function master_user_store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function master_user_destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return redirect()->back()->with('error', 'Data not found');
        }
        $user->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }
}
