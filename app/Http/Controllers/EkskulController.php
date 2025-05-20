<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    // Menampilkan halaman daftar ekskul
    public function index()
    {
        $ekskul = Ekskul::all();
        return view('admin.ekskul', compact('ekskul'));
    }

    // Menyimpan data ekskul baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'hari_kegiatan' => 'required|string',
            'waktu_kegiatan' => 'required',
            'deskripsi' => 'required|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Proses upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('ekskul', 'public');
        }

        // Simpan ke database
        Ekskul::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'hari_kegiatan' => $request->hari_kegiatan,
            'waktu_kegiatan' => $request->waktu_kegiatan,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
        ]);

        return redirect()->back()->with('success', 'Ekskul berhasil ditambahkan.');
    }
    public function edit($id)
{
    $ekskul = Ekskul::findOrFail($id);
    return view('admin.edit_ekskul', compact('ekskul'));
}

// Menghapus ekskul
public function destroy($id)
{
    $ekskul = Ekskul::findOrFail($id);
    
    // Hapus file foto jika ada
    if ($ekskul->foto) {
        Storage::delete('public/' . $ekskul->foto);
    }

    $ekskul->delete();
    return redirect()->route('ekskul')->with('success', 'Data ekskul berhasil dihapus.');
}
public function update(Request $request, $id)
{
    $request->validate([
        'nama_ekskul' => 'required',
        'pembina' => 'required',
        'hari_kegiatan' => 'required',
        'waktu_kegiatan' => 'required',
        'deskripsi' => 'required',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $ekskul = Ekskul::findOrFail($id);
    $ekskul->nama_ekskul = $request->nama_ekskul;
    $ekskul->pembina = $request->pembina;
    $ekskul->hari_kegiatan = $request->hari_kegiatan;
    $ekskul->waktu_kegiatan = $request->waktu_kegiatan;
    $ekskul->deskripsi = $request->deskripsi;

    if ($request->hasFile('foto')) {
        // Hapus foto lama
        if ($ekskul->foto) {
            Storage::delete('public/' . $ekskul->foto);
        }

        $fotoPath = $request->file('foto')->store('ekskul', 'public');
        $ekskul->foto = $fotoPath;
    }

    $ekskul->save();

    return redirect()->route('ekskul')->with('success', 'Ekskul berhasil diperbarui.');
}

}
