<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index()
    {
        $kelas = Kelas::orderBy('tingkat')->orderBy('nama_kelas')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    public function create()
    {
        return view('admin.kelas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tingkat' => 'required',
            'nama_kelas' => 'required',
        ]);

        Kelas::create($request->only('tingkat', 'nama_kelas'));

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil ditambahkan');
    }

    public function edit(Kelas $kela)
    {
        return view('admin.kelas.edit', [
            'kelas' => $kela
        ]);
    }

    public function update(Request $request, Kelas $kela)
    {
        $request->validate([
            'tingkat' => 'required',
            'nama_kelas' => 'required',
        ]);

        $kela->update($request->only('tingkat', 'nama_kelas'));

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil diperbarui');
    }

    public function destroy(Kelas $kela)
    {
        $kela->delete();

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Kelas berhasil dihapus');
    }
}
