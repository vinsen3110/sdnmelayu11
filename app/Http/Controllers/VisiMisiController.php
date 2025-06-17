<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VisiMisiController extends Controller
{
    // Tampilkan daftar semua data visi & misi
    public function index()
    {
        $data = VisiMisi::all();
        return view('admin.adm_visimisi', ['visimisi' => $data]);
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('visimisi', 'public');
        }

        VisiMisi::create([
            'judul' => $request->judul,
            'foto' => $fotoPath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('visimisi')->with('success', 'Data berhasil ditambahkan.');
    }

    // Tampilkan data untuk diedit
    public function edit($id)
    {
        $data = VisiMisi::findOrFail($id);
        return view('admin.adm_visimisi_edit', compact('data'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $data = VisiMisi::findOrFail($id);

        // Hapus foto lama jika ada upload baru
        if ($request->hasFile('foto')) {
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->foto);
            }
            $data->foto = $request->file('foto')->store('visimisi', 'public');
        }

        $data->judul = $request->judul;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return redirect()->route('visimisi')->with('success', 'Data berhasil diperbarui.');
    }

    // Hapus data
    public function destroy($id)
    {
        $data = VisiMisi::findOrFail($id);

        // Hapus file foto jika ada
        if ($data->foto && Storage::disk('public')->exists($data->foto)) {
            Storage::disk('public')->delete($data->foto);
        }

        $data->delete();

        return redirect()->route('visimisi')->with('success', 'Data berhasil dihapus.');
    }
}
