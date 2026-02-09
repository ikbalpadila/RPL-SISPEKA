@extends('layouts.app')

@section('content')

<h3>Edit Guru</h3>

<form method="POST" action="{{ route('admin.guru.update', $guru->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>NIP</label>
        <input name="nip" class="form-control" value="{{ $guru->nip }}">
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input name="nama" class="form-control" value="{{ $guru->nama }}">
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input name="email" class="form-control" value="{{ $guru->email }}">
    </div>

    <div>
        <label>Telepon</label>
        <input name="telepon" class="form-control" value="{{ $guru->telepon }}">
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control">
            <option value="L" {{ $guru->jenis_kelamin=='L'?'selected':'' }}>L</option>
            <option value="P" {{ $guru->jenis_kelamin=='P'?'selected':'' }}>P</option>
        </select>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection
