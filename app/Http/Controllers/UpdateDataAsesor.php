<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateDataAsesor extends Controller
{
    public function edit($id)
    {
        // Find the Asesor record to update
        $user = Asesor::findOrFail($id);

        // Return a view with the Asesor record
        return view('asesor.edit', compact('user'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
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
        ]);

        // Find the Asesor record to update
        $user = Asesor::findOrFail($id);

        // Update the fields in the Asesor model
        $user->update([
            'email' => $request->email,
            'nama_asesor' => $request->nama_asesor,
            'role' => $request->role,
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
        ]);

        // Update the corresponding User record if it exists
        $relatedUser = User::where('email', $user->email)->first();

        if ($relatedUser) {
            $relatedUser->update([
                'email' => $request->email,
                'name' => $request->nama_asesor,
                'role' => $request->role,
                'sekolah_id' => $request->sekolah_id,
                'jurusan_id' => $request->jurusan_id,
            ]);
        }

        // Handle file uploads
        $this->handleFileUploads($request, $user);

        // Return a response, redirect, or perform any other necessary action
        return redirect()->route('your.route.name')->with('success', 'Asesor updated successfully');
    }

    private function handleFileUploads(Request $request, Asesor $user)
    {
        // Check if new files are provided and update the file fields accordingly
        if ($request->hasFile('scan_ktp')) {
            $this->updateFileField($request, 'scan_ktp', $user, 'scan_ktp');
        }

        if ($request->hasFile('scan_npwp')) {
            $this->updateFileField($request, 'scan_npwp', $user, 'scan_npwp');
        }

        if ($request->hasFile('sertif_metodologi')) {
            $this->updateFileField($request, 'sertif_metodologi', $user, 'sertif_metodologi');
        }

        if ($request->hasFile('sertif_kompetensi')) {
            $this->updateFileField($request, 'sertif_kompetensi', $user, 'sertif_kompetensi');
        }

        if ($request->hasFile('scan_burek')) {
            $this->updateFileField($request, 'scan_burek', $user, 'scan_burek');
        }
    }

    private function updateFileField(Request $request, $inputName, Asesor $user, $fieldName)
    {
        // Delete the old file
        Storage::delete($user->{$fieldName});

        // Store the new file
        $user->{$fieldName} = $request->file($inputName)->store("public/uploads/{$fieldName}");
        $user->save();
    }
}
