@extends('layouts.admin')

@section('content')

<div class="page-header">
    <div class="page-title">
        Laporan Akademik Siswa
    </div>

    {{-- Tombol Kembali --}}
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        Kembali
    </a>
</div>

<div class="card">
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        @forelse($siswas as $i => $siswa)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.report.mapel', $siswa->id) }}"
                       class="btn btn-primary">
                        Lihat Laporan
                    </a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" style="text-align:center; color:#6b7280;">
                    Tidak ada data siswa
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
</div>

@endsection
