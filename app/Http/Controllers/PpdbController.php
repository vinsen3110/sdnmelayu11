<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ppdb;
use Illuminate\Support\Facades\Storage;

class PpdbController extends Controller
{
    public function index()
    {
        $data = Ppdb::all();
        return view('admin.adm_ppdb', compact('data'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $filename = null;
        if ($request->hasFile('foto')) {
            $filename = $request->file('foto')->store('ppdb', 'public');
        }

        Ppdb::create([
            'judul' => $request->judul,
            'foto' => $filename,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('success', 'Data PPDB berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $ppdb = Ppdb::findOrFail($id);
        return response()->json($ppdb);
    }

    public function update(Request $request, $id)
    {
        $ppdb = Ppdb::findOrFail($id);

        $request->validate([
            'judul' => 'nullable|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            if ($ppdb->foto && Storage::disk('public')->exists($ppdb->foto)) {
                Storage::disk('public')->delete($ppdb->foto);
            }
            $ppdb->foto = $request->file('foto')->store('ppdb', 'public');
        }

        $ppdb->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'foto' => $ppdb->foto,
        ]);

        return redirect()->back()->with('success', 'Data PPDB berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ppdb = Ppdb::findOrFail($id);

        if ($ppdb->foto && Storage::disk('public')->exists($ppdb->foto)) {
            Storage::disk('public')->delete($ppdb->foto);
        }

        $ppdb->delete();

        return redirect()->back()->with('success', 'Data PPDB berhasil dihapus.');
    }
}
