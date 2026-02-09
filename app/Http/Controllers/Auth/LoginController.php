<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Guru;
use App\Models\Siswa;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // DEBUG (AKTIFKAN SEMENTARA JIKA PERLU)
        // dd($request->all());

        $request->validate([
            'role' => 'required|in:admin,guru,wali',
            'password' => 'required',
        ]);

        /* ================= ADMIN ================= */
        if ($request->role === 'admin') {

            if (Auth::attempt([
                'email' => $request->email,
                'password' => $request->password,
                'role' => 'admin'
            ])) {

                $request->session()->regenerate();
                return redirect()->route('admin.dashboard');
            }

            return back()->withErrors(['email' => 'Login admin gagal']);
        }

        /* ================= GURU ================= */
        if ($request->role === 'guru') {

            $request->validate(['nip' => 'required']);

            $guru = Guru::where('nip', $request->nip)
                ->with('user')
                ->first();

            if (!$guru) {
                return back()->withErrors(['nip' => 'NIP tidak ditemukan']);
            }

            if (!$guru->user) {
                return back()->withErrors(['nip' => 'Akun guru belum dibuat admin']);
            }

            if (!Hash::check($request->password, $guru->user->password)) {
                return back()->withErrors(['password' => 'Password salah']);
            }

            Auth::login($guru->user);
            $request->session()->regenerate();

            return redirect()->route('guru.dashboard');
        }

        /* ================= WALI ================= */
        if ($request->role === 'wali') {

            $request->validate(['nis' => 'required']);

            $siswa = Siswa::where('nis', $request->nis)
                ->with('user')
                ->first();

            if (!$siswa || !$siswa->user) {
                return back()->withErrors(['nis' => 'Akun wali belum terdaftar']);
            }

            if (!Hash::check($request->password, $siswa->user->password)) {
                return back()->withErrors(['password' => 'Password salah']);
            }

            Auth::login($siswa->user);
            $request->session()->regenerate();

            return redirect()->route('wali.dashboard');
        }

        return back()->withErrors(['login' => 'Login gagal']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
