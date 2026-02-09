@extends('layouts.app')

@section('content')

<h3>Tambah Kelas</h3>

<form method="POST" action="{{ route('admin.kelas.store') }}">
    @csrf

    <div class="mb-3">
        <label>Tingkat</label>
        <select name="tingkat" class="form-control" required>
            <option value="">-- Pilih Tingkat --</option>
            <option value="X">X</option>
            <option value="XI">XI</option>
            <option value="XII">XII</option>
        </select>
    </div>

    <div class="mb-3">
        <label>Nama Kelas</label>
        <input name="nama_kelas" class="form-control" placeholder="IPA 1 / IPS 2" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
