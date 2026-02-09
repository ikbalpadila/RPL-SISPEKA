@extends('layouts.app')

@section('content')

<h3>Tambah Teaching Assignment</h3>

<form method="POST" action="{{ route('admin.assignments.store') }}">
    @csrf

    <div class="mb-3">
        <label>Guru</label>
        <select name="guru_id" class="form-control" required>
            <option value="">-- Pilih Guru --</option>
            @foreach($gurus as $guru)
                <option value="{{ $guru->id }}">{{ $guru->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Mata Pelajaran</label>
        <select name="mapel_id" class="form-control" required>
            <option value="">-- Pilih Mapel --</option>
            @foreach($mapels as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->nama_mapel }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Kelas</label>
        <select name="kelas_id" class="form-control" required>
            <option value="">-- Pilih Kelas --</option>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->tingkat }} {{ $k->nama_kelas }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="{{ route('admin.assignments.index') }}" class="btn btn-secondary">Kembali</a>

</form>

@endsection
