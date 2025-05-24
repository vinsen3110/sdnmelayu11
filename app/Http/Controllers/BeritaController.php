<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::all();  // variabel plural tetap "berita"
        return view('berita.index', compact('berita'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_berita' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jam' => 'required',
            'tanggal' => 'required|numeric|min:1|max:31',
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric',
        ]);

        $path = null;
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('public/foto_berita');
        }

        Berita::create([
            'judul_berita' => $request->judul_berita,
            'foto' => $path,
            'jam' => $request->jam,
            'tanggal' => $request->tanggal,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun,
        ]);

        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan.');
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
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'jam' => 'required',
            'tanggal' => 'required|numeric|min:1|max:31',
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric',
        ]);

        if ($request->hasFile('foto')) {
            if ($berita->foto) {
                Storage::delete($berita->foto);
            }
            $berita->foto = $request->file('foto')->store('public/foto_berita');
        }

        $berita->judul_berita = $request->judul_berita;
        $berita->jam = $request->jam;
        $berita->tanggal = $request->tanggal;
        $berita->bulan = $request->bulan;
        $berita->tahun = $request->tahun;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        if ($berita->foto) {
            Storage::delete($berita->foto);
        }
        $berita->delete();

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dihapus.');
    }
}
