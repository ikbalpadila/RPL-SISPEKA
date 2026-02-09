<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'role'     => 'required|in:guru,wali',
            'password' => 'required|min:6',
            'email'    => 'required|email|unique:users,email',
        ]);

        /* ================= GURU ================= */
        if ($request->role === 'guru') {

            $request->validate(['nip' => 'required']);

            $guru = Guru::where('nip', $request->nip)->first();

            if (!$guru) {
                return back()->withErrors(['nip' => 'NIP tidak terdaftar']);
            }

            if ($guru->user_id) {
                return back()->withErrors(['nip' => 'Akun guru sudah terdaftar']);
            }

            $user = User::create([
                'name' => $guru->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'guru',
            ]);

            $guru->update(['user_id' => $user->id]);
        }

        /* ================= WALI ================= */
        if ($request->role === 'wali') {

            $request->validate(['nis' => 'required']);

            $siswa = Siswa::where('nis', $request->nis)->first();

            if (!$siswa) {
                return back()->withErrors(['nis' => 'NIS tidak terdaftar']);
            }

            if ($siswa->user_id) {
                return back()->withErrors(['nis' => 'Akun wali sudah terdaftar']);
            }

            $user = User::create([
                'name' => $siswa->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => 'wali',
            ]);

            $siswa->update(['user_id' => $user->id]);
        }

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silakan login');
    }
}
