<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();
        return view('admin.adm_berita', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required|string|max:255',
            'deskripsi' => 'required|string', // Tambahan validasi deskripsi
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jam' => 'required',
            'tanggal' => 'required|date',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto_berita');
        }
        
        Berita::create([
            'judul_berita' => $request->judul_berita,
            'deskripsi' => $request->deskripsi, // Tambahan simpan deskripsi
            'foto' => $path,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
        ]);

        return redirect()->route('berita')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul_berita' => 'required|string|max:255',
            'deskripsi' => 'required|string', // Tambahan validasi deskripsi
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jam' => 'required',
            'tanggal' => 'required|date',
        ]);

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::delete($berita->foto);
            }
            $berita->foto = $request->file('foto')->store('public/foto_berita');
        }

        $berita->judul_berita = $request->judul_berita;
        $berita->deskripsi = $request->deskripsi; // Tambahan update deskripsi
        $berita->jam = $request->jam;
        $berita->tanggal = $request->tanggal;
        $berita->save();

        return redirect()->route('berita')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->foto) {
            Storage::delete($berita->foto);
        }
        $berita->delete();

        return redirect()->route('berita')->with('success', 'Berita berhasil dihapus.');
    }
}
