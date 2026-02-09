<?php

namespace App\Http\Controllers\Wali;

use App\Http\Controllers\Controller;
use App\Models\BehaviorNote;

class BehaviorController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $siswa = $user->siswa;

        if (!$siswa) {
            abort(403, 'Data siswa belum terhubung');
        }

        $behaviors = BehaviorNote::with('guru')
            ->where('siswa_id', $siswa->id)
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('wali.behavior.index', compact(
            'siswa',
            'behaviors'
        ));
    }
}
