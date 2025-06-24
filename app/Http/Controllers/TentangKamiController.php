<?php

namespace App\Http\Controllers;

use App\Models\TentangKami;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TentangKamiController extends Controller
{
    public function index()
    {
        $tentangkami = TentangKami::all();
        return view('admin.adm_tentangkami', compact('tentangkami'));
    }

    public function create()
    {
        return view('admin.tentang_kami_create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $data = $request->only('judul', 'deskripsi');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('tentang_kami', 'public');
        }

        TentangKami::create($data);

        return redirect()->route('tentangkami')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = TentangKami::findOrFail($id);
        return view('admin.tentang_kami_edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = TentangKami::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $input = $request->only('judul', 'deskripsi');

        if ($request->hasFile('foto')) {
            $input['foto'] = $request->file('foto')->store('tentang_kami', 'public');
        }

        $data->update($input);

        return redirect()->route('tentangkami')->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        $data = TentangKami::findOrFail($id);
        $data->delete();

        return redirect()->route('tentangkami')->with('success', 'Data berhasil dihapus');
    }
}
