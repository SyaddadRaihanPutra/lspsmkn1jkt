<?php

namespace App\Http\Controllers;

use App\Models\Asesor;
use App\Models\Jurusan;
use App\Models\Sekolah;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateData extends Controller
{
    public function edit($id)
    {
        $role = "Asesor";
        $user = Asesor::findOrFail($id);
        $sekolah = Sekolah::all();
        $jurusan = Jurusan::all();
        $asesorData = Asesor::where('email', $user->email)->first();

        return view('asesor.detaildiri-edit', compact('role', 'user', 'sekolah', 'jurusan', 'asesorData'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'email' => 'required|email',
            'password' => 'sometimes|nullable|string|min:8|confirmed',
            'nama_asesor' => 'sometimes|nullable|string|max:255',
            'no_reg' => 'sometimes|nullable',
            'npwp' => 'sometimes|nullable',
            'nama_bank' => 'sometimes|nullable',
            'no_rek' => 'sometimes|nullable',
            'tempat_lahir' => 'sometimes|nullable',
            'tgl_lahir' => 'sometimes|nullable',
            'agama' => 'sometimes|nullable',
            'jk' => 'sometimes|nullable',
            'alamat' => 'sometimes|nullable',
            'no_telp' => 'sometimes|nullable',
            'sekolah_id' => 'sometimes|nullable',
            'jurusan_id' => 'sometimes|nullable',
            'scan_ktp' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'scan_npwp' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'sertif_metodologi' => 'sometimes|nullable|mimetypes:application/pdf,application/vnd.openxmlformats-officedocument.wordprocessingml.document|max:2048',
            'sertif_kompetensi' => 'sometimes|nullable|mimetypes:application/pdf|max:2048',
            'scan_burek' => 'sometimes|nullable|mimetypes:application/pdf|max:2048',
            // 'ttd' => 'sometimes|nullable',
        ]);

        // @dd($request->all());

        // Find the Asesor record to update
        $user = Asesor::findOrFail($id);

        $oldEmail = $user->email;

        // Update the fields in the Asesor model
        $user->update([
            'email' => $request->email,
            'nama_asesor' => $request->nama_asesor,
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
            // 'ttd' => $request->ttd,
        ]);

        // Update the corresponding User record if it exists
        $relatedUser = User::where('email', $oldEmail)->first();

        if ($relatedUser) {
            $relatedUser->update([
                'email' => $request->email,
                'name' => $request->nama_asesor,
                'sekolah_id' => $request->sekolah_id,
                'jurusan_id' => $request->jurusan_id,
            ]);
        }


        // Handle file uploads
        $this->handleFileUploads($request, $user);

        // Return a response, redirect, or perform any other necessary action
        return redirect()->route('detaildiri')->with('success', 'Data diri Asesor berhasil diubah');
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

        // Generate a 5-digit UUID
        $uuid = Str::random(5);

        // Get the file extension
        $extension = $request->file($inputName)->getClientOriginalExtension();

        // Combine UUID and extension to create a unique filename
        $newFilename = "{$uuid}.{$extension}";

        // Store the new file with the unique filename
        $user->{$fieldName} = $request->file($inputName)->storeAs("public/uploads/{$fieldName}", $newFilename);
        $user->save();
    }
}
