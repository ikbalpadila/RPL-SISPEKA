@extends('layouts.auth')

@section('content')
<div class="page" style="--from:120px;">
    <div class="card">

        <!-- WELCOME -->
        <div class="panel welcome">
            <img src="{{ asset('images/sispekalogo.png') }}" 
                alt="Logo SISPEKA"
                class="logo-sispeka">

            <h1>Selamat Datang</h1>
            <p>Buat akun dan mulai gunakan sistem SISPEKA.</p>
        </div>

        <!-- FORM -->
        <div class="panel">
            <h2>Daftar Akun</h2>

            <form method="POST" action="{{ route('register') }}">
                @csrf
            
                <label>Email</label>
                <input type="email" name="email" required>
            
                <label>Registrasi Sebagai</label>
                <select name="role" id="role" onchange="toggleRole()" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="guru">Guru</option>
                    <option value="wali">Wali Murid</option>
                </select>
            
                <div id="nipField" style="display:none;">
                    <label>NIP Guru</label>
                    <input type="text" name="nip">
                </div>
            
                <div id="nisField" style="display:none;">
                    <label>NIS Siswa</label>
                    <input type="text" name="nis">
                </div>
            
                <label>Password</label>
                <input type="password" name="password" required>
            
                <button>Daftar</button>

                <div class="link">
                    Sudah punya akun?
                    <a href="{{ route('login') }}">Login</a>
                </div>

            </form>
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    {{ $errors->first() }}
                </div>
            @endif


    </div>
</div>

<script>
function toggleRole() {
    let r = document.getElementById('role').value;
    document.getElementById('nipField').style.display = r === 'guru' ? 'block' : 'none';
    document.getElementById('nisField').style.display = r === 'wali' ? 'block' : 'none';
}
</script>
@endsection
