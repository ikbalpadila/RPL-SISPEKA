@extends('layouts.app')

@section('content')

<h3>Tambah Guru</h3>

<form method="POST" action="{{ route('admin.guru.store') }}">
    @csrf

    <div class="mb-3">
        <label>NIP</label>
        <input name="nip" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input name="nama" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Telepon</label>
        <input name="telepon" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection
