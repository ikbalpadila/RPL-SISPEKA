@extends('layouts.app')

@section('content')

<h3>Edit Mata Pelajaran</h3>

<form method="POST" action="{{ route('admin.mapel.update', $mapel->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Kode Mata Pelajaran</label>
        <input name="kode_mapel"
               class="form-control"
               value="{{ $mapel->kode_mapel }}">
    </div>

    <div class="mb-3">
        <label>Nama Mata Pelajaran</label>
        <input name="nama_mapel"
               class="form-control"
               value="{{ $mapel->nama_mapel }}">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.mapel.index') }}" class="btn btn-secondary">
        Kembali
    </a>

</form>

@endsection
