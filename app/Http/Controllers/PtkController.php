<?php

namespace App\Http\Controllers;

use App\Models\Ptk;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class PtkController extends Controller
{
    public function index(Request $request)
    {
        $query = Ptk::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nama_ptk', 'like', "%{$search}%")
                    ->orWhere('jabatan', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('no_tmt', 'like', "%{$search}%");
            });
        }

        $ptks = $query->latest()->get();

        return view('admin.adm_ptk', compact('ptks'));
    }

    public function create()
    {
        return view('admin.ptk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_tmt' => 'required|date',
            'nama_ptk' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'status_kepegawaian' => 'required|in:ASN,P3K,Honorer',
            'pendidikan_terakhir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required|string|max:20',
            'email' => 'nullable|email',
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->only([
            'no_tmt',
            'nama_ptk',
            'jabatan',
            'status_kepegawaian',
            'pendidikan_terakhir',
            'jenis_kelamin',
            'no_hp',
            'email'
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('foto_ptk', 'public');
        }

        Ptk::create($data);

        return redirect()->route('ptk.index')->with('success', 'Data PTK berhasil ditambahkan.');
    }

    public function edit(Ptk $ptk)
    {
        return view('admin.ptk.edit', compact('ptk'));
    }

    public function update(Request $request, Ptk $ptk)
    {
     
        
        $request->validate([
            'no_tmt' => 'required|date',
            'nama_ptk' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'status_kepegawaian' => 'required|in:ASN,P3K,Honorer',
            'pendidikan_terakhir' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'no_hp' => 'required|string|max:20',
            'email' => [
                'nullable',
                'email',
                Rule::unique('ptk', 'email')->ignore($ptk->id, 'id'),
            ],
            'foto' => 'nullable|image|max:2048'
        ]);

        $data = $request->only([
            'no_tmt',
            'nama_ptk',
            'jabatan',
            'status_kepegawaian',
            'pendidikan_terakhir',
            'jenis_kelamin',
            'no_hp',
            'email'
        ]);

        if ($request->hasFile('foto')) {
            if ($ptk->foto && Storage::disk('public')->exists($ptk->foto)) {
                Storage::disk('public')->delete($ptk->foto);
            }
            $data['foto'] = $request->file('foto')->store('foto_ptk', 'public');
        }

        $ptk->update($data);

        return redirect()->route('ptk.index')->with('success', 'Data PTK berhasil diperbarui.');
    }

    public function destroy(Ptk $ptk)
    {
        if ($ptk->foto && Storage::disk('public')->exists($ptk->foto)) {
            Storage::disk('public')->delete($ptk->foto);
        }

        $ptk->delete();

        return redirect()->route('ptk.index')->with('success', 'Data PTK berhasil dihapus.');
    }
}
