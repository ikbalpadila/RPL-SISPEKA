@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-title">Daftar Mata Pelajaran</div>

    <a href="{{ route('admin.report.index') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

<div class="card">
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
    <p><strong>Kelas:</strong> {{ $siswa->kelas->nama_kelas }}</p>
</div>

<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Mata Pelajaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @foreach($mapel as $i => $m)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $m->mapel->nama_mapel }}</td>
                <td>
                    <a href="{{ route('admin.report.detail', [$siswa->id, $m->mapel->id]) }}"
                       class="btn btn-primary">
                        Lihat Nilai
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection
