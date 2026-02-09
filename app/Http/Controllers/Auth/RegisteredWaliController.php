<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisteredWaliController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|exists:siswas,nis',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();

        $user = User::create([
            'email' => $request->email,
            'username' => $siswa->nis,
            'password' => Hash::make($request->password),
            'role' => 'wali',
        ]);

        Auth::login($user);

        return redirect('/wali/dashboard');
    }

}
