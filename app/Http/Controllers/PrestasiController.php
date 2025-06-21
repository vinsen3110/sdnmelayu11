<?php

namespace App\Http\Controllers;

use App\Models\Prestasi;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $query = Prestasi::query();

        if ($search) {
            $query->where('nama_siswa', 'like', '%' . $search . '%')
                  ->orWhere('nama_prestasi', 'like', '%' . $search . '%')
                  ->orWhere('peringkat', 'like', '%' . $search . '%')
                  ->orWhere('jenis_prestasi', 'like', '%' . $search . '%')
                  ->orWhere('tingkat', 'like', '%' . $search . '%')
                  ->orWhere('tahun', 'like', '%' . $search . '%');
        }

        $prestasi = $query->get();

        return view('admin.adm_prestasi', compact('prestasi'));
    }

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_siswa' => 'required|string',
            'nama_prestasi' => 'required|string',
            'peringkat' => 'required|string',
            'jenis_prestasi' => 'required|string',
            'tingkat' => 'required|string',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create($validated);

        return redirect()->route('prestasi.index')->with('success', 'Data berhasil disimpan!');
    }

    public function show($id)
    {
        $item = Prestasi::findOrFail($id);
        return view('admin.prestasi.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Prestasi::findOrFail($id);
        return view('admin.prestasi.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = Prestasi::findOrFail($id);

        $validated = $request->validate([
            'nama_siswa' => 'required|string',
            'nama_prestasi' => 'required|string',
            'peringkat' => 'required|string',
            'jenis_prestasi' => 'required|string',
            'tingkat' => 'required|string',
            'tahun' => 'required|integer',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:2048'
        ]);

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('prestasi', 'public');
        }

        $item->update($validated);

        return redirect()->route('prestasi.index')->with('success', 'Data berhasil diupdate!');
    }

    public function destroy($id)
    {
        $item = Prestasi::findOrFail($id);
        $item->delete();

        return redirect()->route('prestasi.index')->with('success', 'Data berhasil dihapus!');
    }
}
