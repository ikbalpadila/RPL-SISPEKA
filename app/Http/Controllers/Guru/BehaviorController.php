<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\BehaviorNote;
use App\Models\Kelas;
use Illuminate\Support\Facades\Auth;
use App\Notifications\BehaviorNoteNotification;

class BehaviorController extends Controller
{
    /**
     * LIST CATATAN PERILAKU
     */
    public function index(Request $request)
    {
        $guru = Auth::user()->guru;

        // 🔐 Kelas yang diajar oleh guru
        $kelasList = $guru->teachingAssignments()
            ->with('kelas')
            ->get()
            ->pluck('kelas')
            ->unique('id')
            ->values();

        // Query catatan perilaku
        $query = BehaviorNote::with(['siswa.kelas'])
            ->where('guru_id', $guru->id);

        // Filter berdasarkan kelas (jika dipilih)
        if ($request->filled('kelas_id')) {
            // 🔐 pastikan kelas milik guru
            abort_if(
                ! $kelasList->pluck('id')->contains($request->kelas_id),
                403,
                'Anda tidak mengajar di kelas ini'
            );

            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('kelas_id', $request->kelas_id);
            });
        }

        $notes = $query
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('guru.behavior.index', [
            'notes'     => $notes,
            'kelasList' => $kelasList,
        ]);
    }
    /**
     * FORM TAMBAH CATATAN
     */
    public function create(Request $request)
    {
        $guru = Auth::user()->guru;

        // 🔐 KELAS KHUSUS YANG DITUGASKAN KE GURU
        $kelasList = $guru->teachingAssignments()
            ->with('kelas')
            ->get()
            ->pluck('kelas')
            ->unique('id')
            ->values();

        $siswas = collect();

        if ($request->filled('kelas_id')) {
            // 🔐 VALIDASI KELAS HARUS MILIK GURU
            abort_if(
                ! $kelasList->pluck('id')->contains($request->kelas_id),
                403,
                'Anda tidak mengajar di kelas ini'
            );

            $siswas = Siswa::where('kelas_id', $request->kelas_id)
                ->orderBy('nama')
                ->get();
        }

        return view('guru.behavior.create', [
            'kelasList' => $kelasList,
            'siswas'    => $siswas,
            'kelasId'   => $request->kelas_id,
        ]);
    }

    /**
     * SIMPAN CATATAN
     */
    public function store(Request $request)
{
    $guru = Auth::user()->guru;

    // kelas yang memang diajar guru
    $kelasIds = $guru->teachingAssignments()
        ->pluck('kelas_id');

    $request->validate([
        'kelas_id' => ['required', 'in:' . $kelasIds->implode(',')],
        'siswa_id' => 'required|exists:siswas,id',
        'jenis'    => 'required|in:positif,negatif,pembinaan',
        'catatan'  => 'required',
        'tanggal'  => 'required|date',
    ]);

    // 🔐 pastikan siswa memang dari kelas tersebut
    $siswa = Siswa::where('id', $request->siswa_id)
        ->where('kelas_id', $request->kelas_id)
        ->firstOrFail();

    BehaviorNote::create([
        'siswa_id' => $siswa->id,
        'guru_id'  => $guru->id,
        'jenis'    => $request->jenis,
        'catatan'  => $request->catatan,
        'tanggal'  => $request->tanggal,
    ]);
    // 🔔 Ambil siswa
    // $siswa = $behavior->siswa;

    // // 🔔 Ambil wali
    // if ($siswa && $siswa->wali) {
    //     $siswa->wali->notify(
    //         new BehaviorNoteNotification($behavior)
    //     );
    // }
    return redirect()
        ->route('guru.behavior.index')
        ->with('success', 'Catatan perilaku berhasil ditambahkan');
}
    /**
     * HAPUS CATATAN
     */
    public function destroy(BehaviorNote $behavior)
    {
        $behavior->delete();

        return back()->with('success', 'Catatan berhasil dihapus');
    }
}
