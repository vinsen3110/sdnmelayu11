<?php

namespace App\Http\Controllers;

use App\Models\Ekskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkskulController extends Controller
{
    /**
     * Tampilkan daftar ekskul.
     */
    public function index()
    {
        $ekskul = Ekskul::all();
        return view('admin.adm_ekskul', compact('ekskul'));
    }

    /**
     * Simpan data ekskul baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_ekskul' => 'required|string|max:255',
            'pembina' => 'required|string|max:255',
            'hari_kegiatan' => 'required|string',
            'waktu_kegiatan' => 'required',
            'deskripsi' => 'required|string',
            'ruangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('ekskul', 'public');
        }

        Ekskul::create([
            'nama_ekskul' => $request->nama_ekskul,
            'pembina' => $request->pembina,
            'hari_kegiatan' => $request->hari_kegiatan,
            'waktu_kegiatan' => $request->waktu_kegiatan,
            'deskripsi' => $request->deskripsi,
            'ruangan' => $request->ruangan,
            'foto' => $fotoPath,
        ]);

        return redirect()->route('ekskul')->with('success', 'Ekskul berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit ekskul.
     */
    public function edit($id)
    {
        $ekskul = Ekskul::findOrFail($id);
        return view('admin.edit_ekskul', compact('ekskul'));
    }

    /**
     * Update data ekskul.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_ekskul' => 'required',
            'pembina' => 'required',
            'hari_kegiatan' => 'required',
            'waktu_kegiatan' => 'required',
            'deskripsi' => 'required',
            'ruangan' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $ekskul = Ekskul::findOrFail($id);
        $ekskul->nama_ekskul = $request->nama_ekskul;
        $ekskul->pembina = $request->pembina;
        $ekskul->hari_kegiatan = $request->hari_kegiatan;
        $ekskul->waktu_kegiatan = $request->waktu_kegiatan;
        $ekskul->deskripsi = $request->deskripsi;
        $ekskul->ruangan = $request->ruangan;

        if ($request->hasFile('foto')) {
            if ($ekskul->foto && Storage::disk('public')->exists($ekskul->foto)) {
                Storage::disk('public')->delete($ekskul->foto);
            }
            $fotoPath = $request->file('foto')->store('ekskul', 'public');
            $ekskul->foto = $fotoPath;
        }

        $ekskul->save();

        return redirect()->route('ekskul')->with('success', 'Ekskul berhasil diperbarui.');
    }

    /**
     * Hapus data ekskul.
     */
    public function destroy($id)
    {
        $ekskul = Ekskul::findOrFail($id);

        if ($ekskul->foto && Storage::disk('public')->exists($ekskul->foto)) {
            Storage::disk('public')->delete($ekskul->foto);
        }

        $ekskul->delete();

        return redirect()->route('ekskul')->with('success', 'Ekskul berhasil dihapus.');
    }
}
