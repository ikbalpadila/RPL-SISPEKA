<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisteredGuruController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',
        ]);

        // 1️⃣ cek nip di tabel guru
        $guru = Guru::where('nip', $request->nip)->first();

        if (!$guru) {
            return back()->withErrors([
                'nip' => 'NIP tidak terdaftar sebagai guru'
            ]);
        }

        // 2️⃣ cek sudah punya akun
        if ($guru->user_id) {
            return back()->withErrors([
                'nip' => 'Guru ini sudah memiliki akun'
            ]);
        }

        // 3️⃣ buat user
        $user = User::create([
            'name' => $guru->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'guru',
        ]);

        // 4️⃣ hubungkan ke guru
        $guru->update([
            'user_id' => $user->id
        ]);

        return redirect()->route('login')
            ->with('success', 'Akun guru berhasil dibuat, silakan login');
    }
}
