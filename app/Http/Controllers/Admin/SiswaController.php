<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSiswaRequest;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Kelas;

class SiswaController extends Controller
{
    /**
     * LIST SISWA PER KELAS
     */
    public function index($kelas)
    {
        $kelas = Kelas::findOrFail($kelas);
    
        $siswas = Siswa::where('kelas_id', $kelas->id)->get();
    
        return view('admin.siswa.index', compact('siswas', 'kelas'));
    }    

    /**
     * FORM TAMBAH SISWA (PER KELAS)
     */
    public function create(Kelas $kelas)
    {
        return view('admin.siswa.create', compact('kelas'));
    }

    /**
     * SIMPAN SISWA
     */
    public function store(StoreSiswaRequest $request)
    {
        $data = $request->validated();

        $siswa = Siswa::create($data);

        return redirect()
            ->route('admin.siswa.index', $siswa->kelas_id)
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * EDIT SISWA
     */
    public function edit(Siswa $siswa)
{
    $kelas = Kelas::orderBy('tingkat')
                  ->orderBy('nama_kelas')
                  ->get();

    return view('admin.siswa.edit', compact('siswa', 'kelas'));
}


    /**
     * UPDATE SISWA
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nis'            => 'required|string|unique:siswas,nis,' . $siswa->id,
            'nama'           => 'required|string',
            'wali_nama'      => 'required|string',
            'tanggal_lahir'  => 'required|date',
            'jenis_kelamin'  => 'required|in:L,P',
        ]);

        $siswa->update([
            'nis'           => $request->nis,
            'nama'          => $request->nama,
            'wali_nama'     => $request->wali_nama,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kelas_id'      => $request->kelas_id,
        ]);        

        return redirect()
            ->route('admin.siswa.index', $siswa->kelas_id)
            ->with('success', 'Siswa berhasil diperbarui');
    }

    /**
     * HAPUS SISWA
     */
    public function destroy(Siswa $siswa)
    {
        $kelasId = $siswa->kelas_id;

        $siswa->delete();

        return redirect()
            ->route('admin.siswa.index', $kelasId)
            ->with('success', 'Siswa berhasil dihapus');
    }

    /**
     * DETAIL SISWA
     */
    public function show(Siswa $siswa)
    {
        $siswa->load('kelas');

        return view('admin.siswa.show', compact('siswa'));
    }

    /**
     * HALAMAN PILIH KELAS
     */
    public function kelasIndex()
    {
        $kelas = Kelas::withCount('siswas')
            ->orderBy('tingkat')
            ->orderBy('nama_kelas')
            ->get();

        return view('admin.siswa.kelas', compact('kelas'));
    }
}
