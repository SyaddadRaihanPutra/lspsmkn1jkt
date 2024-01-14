<?php

namespace App\Http\Controllers;

use App\Models\Asesi;
use App\Models\Asesor;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegisController extends Controller
{
    /**
     * Menampilkan formulir pendaftaran siswa.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sekolah = Sekolah::all();
        $jurusan = Jurusan::all();
        return view('auth.register', compact('sekolah', 'jurusan'));
    }

    /**
     * Menangani proses pendaftaran siswa.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8',
            'sekolah_id' => 'required',
            'jurusan_id' => 'required',
        ]);

        // Membuat instance siswa dan menyimpan data ke dalam database
        $user = User::create([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'sekolah_id' => $request->sekolah_id,
            'jurusan_id' => $request->jurusan_id,
        ]);

        $asesi = new Asesi ([
            'nama_asesi' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'sekolah_id' => $request->sekolah_id,
            'jurusan_id' => $request->jurusan_id,
        ]);

        $asesi->save();

        // Mengembalikan respons redirect dan menampilkan pesan sukses
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silahkan login untuk melanjutkan.');
    }

    public function register_asesor()
    {
        $sekolah = Sekolah::all();
        $jurusan = Jurusan::all();
        return view('auth.register-asesor', compact('sekolah', 'jurusan'));
    }

    public function register_asesor_post(Request $request)
    {
        // Validasi data yang diterima dari formulir
        $request->validate([
            'nama_asesor' => 'required|string|max:255',
            'role' => 'required',
            'no_reg' => 'required',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
            'npwp' => 'required',
            'nama_bank' => 'required',
            'no_rek' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'sekolah_id' => 'required',
            'jurusan_id' => 'required',
            'scan_ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'scan_npwp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sertif_metodologi' => 'required|mimetypes:application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:2048',
            'sertif_kompetensi' => 'required|mimetypes:application/pdf|max:2048',
            'scan_burek' => 'required|mimetypes:application/pdf|max:2048',
            'ttd' => 'required',
        ]);

        // Handle file uploads
        // $scanKtpPath = $request->file('scan_ktp')->store('uploads/scan_ktp');
        // $scanNpwpPath = $request->file('scan_npwp')->store('uploads/scan_npwp');
        // $sertifMetodologiPath = $request->file('sertif_metodologi')->store('uploads/sertif_metodologi');
        // $sertifKompetensiPath = $request->file('sertif_kompetensi')->store('uploads/sertif_kompetensi');
        // $scanBurekPath = $request->file('scan_burek')->store('uploads/scan_burek');

        $uuid = substr(str_replace('-', '', Str::uuid()), 0, 5);

        $scanKtpPath = $request->file('scan_ktp')->storeAs('public/uploads/scan_ktp', $uuid . '.' . $request->file('scan_ktp')->getClientOriginalExtension());
        $scanNpwpPath = $request->file('scan_npwp')->storeAs('public/uploads/scan_npwp', $uuid . '.' . $request->file('scan_npwp')->getClientOriginalExtension());
        $sertifMetodologiPath = $request->file('sertif_metodologi')->storeAs('public/uploads/sertif_metodologi', $uuid . '.' . $request->file('sertif_metodologi')->getClientOriginalExtension());
        $sertifKompetensiPath = $request->file('sertif_kompetensi')->storeAs('public/uploads/sertif_kompetensi', $uuid . '.' . $request->file('sertif_kompetensi')->getClientOriginalExtension());
        $scanBurekPath = $request->file('scan_burek')->storeAs('public/uploads/scan_burek', $uuid . '.' . $request->file('scan_burek')->getClientOriginalExtension());


        // dd($request->all());

        // Create a new Asesor instance
        $user = new Asesor;

        // Fill the instance with data from the request
        $user->fill([
            'nama_asesor' => $request->nama_asesor,
            'role' => $request->role,
            'email' => $request->email,
            'no_reg' => $request->no_reg,
            'npwp' => $request->npwp,
            'nama_bank' => $request->nama_bank,
            'no_rek' => $request->no_rek,
            'tempat_lahir' => $request->tempat_lahir,
            'tgl_lahir' => $request->tgl_lahir,
            'agama' => $request->agama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'sekolah_id' => $request->sekolah_id,
            'jurusan_id' => $request->jurusan_id,
            'scan_ktp' => $scanKtpPath,
            'scan_npwp' => $scanNpwpPath,
            'sertif_metodologi' => $sertifMetodologiPath,
            'sertif_kompetensi' => $sertifKompetensiPath,
            'scan_burek' => $scanBurekPath,
            'ttd' => $request->ttd,
        ]);

        // Save the instance to the database
        $user->save();

        $reg_user = new User([
            'name' => $request->nama_asesor,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'sekolah_id' => $request->sekolah_id,
            'jurusan_id' => $request->jurusan_id,
        ]);
        $reg_user->save();

        // Mengembalikan respons redirect dan menampilkan pesan sukses
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil! Silahkan login untuk melanjutkan.');
    }
}
