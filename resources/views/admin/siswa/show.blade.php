@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Siswa</h5>
    </div>

    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th width="200">NIS</th>
                <td>{{ $siswa->nis }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $siswa->nama }}</td>
            </tr>
            <tr>
                <th>Kelas</th>
                <td>{{ $siswa->kelas?->tingkat }} {{ $siswa->kelas?->nama_kelas }}</td>     
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td>{{ $siswa->tanggal_lahir }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $siswa->jenis_kelamin }}</td>
            </tr>
            <tr>
                <th>Nama Wali</th>
                <td>{{ $siswa->wali_nama }}</td>
            </tr>
        </table>
    </div>

    <div class="card-footer d-flex gap-2">
        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
            ⬅ Kembali
        </a>
        <a href="{{ route('siswa.edit', $siswa->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>
    </div>
</div>

@endsection
