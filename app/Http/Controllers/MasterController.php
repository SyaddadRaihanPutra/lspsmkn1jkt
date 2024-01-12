<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MasterController extends Controller
{
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
            'nama_jurusan' => $request->input('nama_jurusan'),
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function master_jurusan_edit($id)
    {
        $role = "Administrator";
        $jurusan_id = Jurusan::find($id);
        return view('admin.masterjurusan-edit', compact('role', 'jurusan_id'));
    }

    public function master_jurusan_update(Request $request, $id)
    {
        $jurusan = Jurusan::find($id);
        $jurusan->update([
            'nama_jurusan' => $request->input('nama_jurusan'),
        ]);
        return redirect()->route('master-jurusan')->with('success', 'Data berhasil diupdate.');
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

    // FUNCTION CREATE USER

    public function master_asesor(Request $request)
    {
        $role = "Administrator";
        $data = User::where('role', '2')->paginate(10);
        $useremail = Auth::user()->email;
        $dataDetail = Asesor::where('email', $useremail)->first();
        return view('admin.masterasesor', compact('role', 'data', 'dataDetail'));
    }

    public function master_asesor_create(Request $request)
    {
        return "Create view";
    }


    // FUNCTION MASTER SEKOLAH

    public function master_sekolah(Request $request)
    {
        $role = "Administrator";
        $sekolah = Sekolah::all();
        return view('admin.mastersekolah', compact('role', 'sekolah'));
    }

    public function master_sekolah_store(Request $request)
    {
        Sekolah::create([
            'nama_sekolah' => $request->input('nama_sekolah'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
        ]);
        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function master_sekolah_edit($id)
    {
        $role = "Administrator";
        $sekolah_id = Sekolah::find($id);
        return view('admin.mastersekolah-edit', compact('role', 'sekolah_id'));
    }

    public function master_sekolah_update(Request $request, $id)
    {
        $sekolah = Sekolah::find($id);
        $sekolah->update([
            'nama_sekolah' => $request->input('nama_sekolah'),
            'alamat' => $request->input('alamat'),
            'no_telp' => $request->input('no_telp'),
        ]);
        return redirect()->route('master-sekolah')->with('success', 'Data berhasil diupdate.');
    }

    public function master_sekolah_destroy($id)
    {
        $sekolah = Sekolah::find($id);
        if (!$sekolah) {
            return redirect()->back()->with('error', 'Data not found');
        }
        $sekolah->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus.');
    }

}
