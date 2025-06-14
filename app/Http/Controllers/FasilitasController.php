<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasController extends Controller
{
    // ✅ INDEX: Menampilkan daftar fasilitas + fitur pencarian
    public function index(Request $request)
    {
        $query = Fasilitas::query();

        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%');
        }

        $fasilitas = $query->latest()->get(); // Atau ->paginate() jika pakai pagination

        return view('admin.adm_fasilitas', compact('fasilitas'));
    }

    // ✅ STORE: Menyimpan fasilitas baru
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

        foreach (['foto1', 'foto2', 'foto3'] as $fotoField) {
            if ($request->hasFile($fotoField)) {
                $data[$fotoField] = $request->file($fotoField)->store('fasilitas', 'public');
            }
        }

        Fasilitas::create($data);

        return redirect()->route('fasilitas')->with('success', 'Fasilitas berhasil ditambahkan.');
    }

    // ✅ UPDATE: Memperbarui data fasilitas
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

        return redirect()->route('fasilitas')->with('success', 'Fasilitas berhasil diperbarui.');
    }

    // ✅ DESTROY: Menghapus fasilitas
    public function destroy($id)
    {
        $fasilitas = Fasilitas::findOrFail($id);

        foreach (['foto1', 'foto2', 'foto3'] as $fotoField) {
            if ($fasilitas->$fotoField) {
                Storage::delete('public/' . $fasilitas->$fotoField);
            }
        }

        $fasilitas->delete();

        return redirect()->route('fasilitas')->with('success', 'Fasilitas berhasil dihapus.');
    }

    // ✅ FRONTEND: Menampilkan data fasilitas ke pengguna
    public function fasilitasFrontend()
    {
        $utama = Fasilitas::where('kategori', 'utama')->get();
        $pendukung = Fasilitas::where('kategori', 'pendukung')->get();

        return view('frontend.fasilitas', compact('utama', 'pendukung'));
    }
}
