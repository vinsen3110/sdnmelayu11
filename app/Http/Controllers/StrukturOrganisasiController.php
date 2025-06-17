<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $data = StrukturOrganisasi::all();
        return view('admin.adm_strukturorganisasi', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('struktur', 'public');
        }

        StrukturOrganisasi::create([
            'judul' => $request->judul,
            'foto' => $fotoPath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('strukturorganisasi')->with('success', 'Data berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $data = StrukturOrganisasi::findOrFail($id);

        if ($request->hasFile('foto')) {
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->foto);
            }
            $data->foto = $request->file('foto')->store('struktur', 'public');
        }

        $data->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('strukturorganisasi')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = StrukturOrganisasi::findOrFail($id);
        if ($data->foto && Storage::disk('public')->exists($data->foto)) {
            Storage::disk('public')->delete($data->foto);
        }

        $data->delete();

        return redirect()->route('strukturorganisasi')->with('success', 'Data berhasil dihapus.');
    }
}
