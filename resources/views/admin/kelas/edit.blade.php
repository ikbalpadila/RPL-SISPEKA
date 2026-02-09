@extends('layouts.app')

@section('content')

<h3>Edit Kelas</h3>

<form method="POST" action="{{ route('admin.kelas.update', $kelas->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>Tingkat</label>
        <select name="tingkat" class="form-control">
            @foreach(['X','XI','XII'] as $t)
                <option value="{{ $t }}" {{ $kelas->tingkat == $t ? 'selected' : '' }}>
                    {{ $t }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Nama Kelas</label>
        <input name="nama_kelas" class="form-control" value="{{ $kelas->nama_kelas }}">
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.kelas.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@endsection
