<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    public function index()
    {
        $fasilitas = Fasilitas::all();
        return view('admin.adm_fasilitas', compact('fasilitas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|in:utama,pendukung',
            'jumlah' => 'required|integer',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->only(['nama', 'kategori', 'jumlah']);

        if ($request->hasFile('foto1')) {
            $data['foto1'] = $request->file('foto1')->store('fasilitas', 'public');
        }
        if ($request->hasFile('foto2')) {
            $data['foto2'] = $request->file('foto2')->store('fasilitas', 'public');
        }
        if ($request->hasFile('foto3')) {
            $data['foto3'] = $request->file('foto3')->store('fasilitas', 'public');
        }

        Fasilitas::create($data);

        return redirect()->back()->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'kategori' => 'required|in:utama,pendukung',
            'jumlah' => 'required|integer',
            'foto1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'foto3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $fasilitas = Fasilitas::findOrFail($id);
        $data = $request->only(['nama', 'kategori', 'jumlah']);

        foreach (['foto1', 'foto2', 'foto3'] as $fotoField) {
            if ($request->hasFile($fotoField)) {
                if ($fasilitas->$fotoField) {
                    Storage::delete('public/' . $fasilitas->$fotoField);
                }
                $data[$fotoField] = $request->file($fotoField)->store('fasilitas', 'public');
            }
        }

        $fasilitas->update($data);

        return redirect()->back()->with('success', 'Fasilitas berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        foreach (['foto1', 'foto2', 'foto3'] as $fotoField) {
            if ($fasilitas->$fotoField) {
                Storage::delete('public/' . $fasilitas->$fotoField);
            }
        }

        $fasilitas->delete();

        return redirect()->back()->with('success', 'Fasilitas berhasil dihapus.');
    }

    // ✅ Tambahan untuk menampilkan fasilitas per kategori di halaman frontend
    public function fasilitasFrontend()
    {
        $utama = Fasilitas::where('kategori', 'utama')->get();
        $pendukung = Fasilitas::where('kategori', 'pendukung')->get();

        return view('frontend.fasilitas', compact('utama', 'pendukung'));
    }
}
