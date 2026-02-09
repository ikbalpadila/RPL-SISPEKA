<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Tampilkan daftar guru
     */
    public function index()
    {
        $gurus = Guru::latest()->get();
        return view('admin.guru.index', compact('gurus'));
    }

    /**
     * Form tambah guru
     */
    public function create()
    {
        return view('admin.guru.create');
    }

    /**
     * Simpan data guru (TANPA USER)
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required|string|unique:gurus,nip',
            'nama' => 'required|string',
            'email' => 'nullable|email|unique:gurus,email',
            'jenis_kelamin' => 'nullable|in:L,P',
            'telepon' => 'nullable|string',
        ]);

        Guru::create([
            'nip'           => $request->nip,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon'       => $request->telepon,
            'user_id'       => null, // BELUM PUNYA AKUN
        ]);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Guru berhasil ditambahkan');
    }

    /**
     * Form edit guru
     */
    public function edit(Guru $guru)
    {
        return view('admin.guru.edit', compact('guru'));
    }

    /**
     * Update data guru
     */
    public function update(Request $request, Guru $guru)
    {
        $request->validate([
            'nip' => 'required|string|unique:gurus,nip,' . $guru->id,
            'nama' => 'required|string',
            'email' => 'nullable|email|unique:gurus,email,' . $guru->id,
            'jenis_kelamin' => 'nullable|in:L,P',
            'telepon' => 'nullable|string',
        ]);

        $guru->update([
            'nip'           => $request->nip,
            'nama'          => $request->nama,
            'email'         => $request->email,
            'jenis_kelamin' => $request->jenis_kelamin,
            'telepon'       => $request->telepon,
        ]);

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Guru berhasil diperbarui');
    }

    /**
     * Hapus guru
     */
    public function destroy(Guru $guru)
    {
        $guru->delete();

        return redirect()
            ->route('admin.guru.index')
            ->with('success', 'Guru berhasil dihapus');
    }

    public function show($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.guru.show', compact('guru'));
    }

    

}
