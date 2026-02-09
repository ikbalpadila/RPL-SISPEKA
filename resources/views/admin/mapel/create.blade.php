@extends('layouts.app')

@section('content')

<h3>Tambah Mata Pelajaran</h3>

<form method="POST" action="{{ route('admin.mapel.store') }}">
    @csrf

    <div class="mb-3">
        <label>Kode Mapel</label>
        <input type="text"
               name="kode_mapel"
               class="form-control"
               placeholder="Contoh: MTK"
               value="{{ old('kode_mapel') }}"
               required>
    </div>

    <div class="mb-3">
        <label>Nama Mata Pelajaran</label>
        <input type="text"
               name="nama_mapel"
               class="form-control"
               placeholder="Contoh: Matematika"
               value="{{ old('nama_mapel') }}"
               required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.mapel.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection
