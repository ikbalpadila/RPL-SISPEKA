@extends('layouts.auth')

@section('content')
<div class="page" style="--from:-120px;">
    <div class="card">

        <!-- FORM LOGIN -->
        <div class="panel">
            <h2>Login Akun</h2>
            <p>Silakan masuk untuk melanjutkan</p>

            <form method="POST" action="{{ route('login.process') }}">
                @csrf

                <label>Login Sebagai</label>
                <select name="role" id="role" onchange="toggleLogin()" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin">Admin</option>
                    <option value="guru">Guru</option>
                    <option value="wali">Wali Murid</option>
                </select>

                <div id="emailField" style="display:none;">
                    <label>Email</label>
                    <input type="email" name="email" disabled>
                </div>

                <div id="nipField" style="display:none;">
                    <label>NIP</label>
                    <input type="text" name="nip" disabled>
                </div>

                <div id="nisField" style="display:none;">
                    <label>NIS</label>
                    <input type="text" name="nis" disabled>
                </div>

                <label>Password</label>
                <input type="password" name="password" required>

                <button type="submit">Masuk</button>

                <div class="link">
                    Belum punya akun?
                    <a href="{{ route('register') }}">Daftar</a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger mt-2">
                        {{ $errors->first() }}
                    </div>
                @endif
            </form>
        </div>

        <!-- WELCOME -->
        <div class="panel welcome">
            <h1>Welcome Back</h1>
            <p>Masuk dan kelola sistem akademik dengan mudah & aman.</p>
        </div>

    </div>
</div>

<script>
function toggleLogin() {
    let role = document.getElementById('role').value;

    let emailField = document.getElementById('emailField');
    let nipField   = document.getElementById('nipField');
    let nisField   = document.getElementById('nisField');

    let emailInput = document.querySelector('[name="email"]');
    let nipInput   = document.querySelector('[name="nip"]');
    let nisInput   = document.querySelector('[name="nis"]');

    // reset semua
    emailField.style.display = 'none';
    nipField.style.display   = 'none';
    nisField.style.display   = 'none';

    emailInput.disabled = true;
    nipInput.disabled   = true;
    nisInput.disabled   = true;

    // aktifkan sesuai role
    if (role === 'admin') {
        emailField.style.display = 'block';
        emailInput.disabled = false;
    }

    if (role === 'guru') {
        nipField.style.display = 'block';
        nipInput.disabled = false;
    }

    if (role === 'wali') {
        nisField.style.display = 'block';
        nisInput.disabled = false;
    }
}
</script>
@endsection
