<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function setting()
    {
        $setting = Setting::first();
        $role = "Administrator";
        return view('admin.setting', compact('setting', 'role'));
    }

    public function update_setting(Request $request)
    {
        $setting = Setting::first();

        // Mengunggah file jika ada file yang diunggah
        if ($request->hasFile('logo_sekolah')) {
            $file = $request->file('logo_sekolah');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/logo_sekolah', $filename);
            $setting->logo_sekolah = $filename;
        }

        // Memperbarui data setting
        $setting->update([
            'nama_sekolah' => $request->nama_sekolah,
            'nama_sekolah_long' => $request->nama_sekolah_long,
            'alamat_sekolah' => $request->alamat_sekolah,
            'url_web_sekolah' => $request->url_web_sekolah,
        ]);

        return redirect()->back()->with('success', 'Data berhasil diupdate.');
    }
}
