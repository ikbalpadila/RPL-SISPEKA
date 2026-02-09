@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>
            Data Siswa Kelas {{ $kelas->tingkat }} {{ $kelas->nama_kelas }}
        </h4>

        <a href="{{ route('admin.siswa.create', $kelas->id) }}"
           class="btn btn-success">
            + Tambah Siswa
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th width="120">NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th width="120">JK</th>
                <th width="220">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($siswas as $siswa)
            <tr>
                <td>{{ $siswa->nis }}</td>
                <td>{{ $siswa->nama }}</td>
                <td>{{ $siswa->kelas->nama_kelas ?? '-' }}</td>
                <td>{{ $siswa->jenis_kelamin }}</td>
                <td>
                    {{-- <a href="{{ route('admin.siswa.show', $siswa->id) }}"
                       class="btn btn-info btn-sm">
                        Lihat
                    </a> --}}

                    <a href="{{ route('admin.siswa.edit', $siswa->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus siswa ini?')"
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Belum ada siswa di kelas ini
                </td>s
            </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('admin.siswa.kelas') }}"
       class="btn btn-secondary mt-3">
        ⬅ Kembali ke Daftar Kelas
    </a>

</div>
@endsection
