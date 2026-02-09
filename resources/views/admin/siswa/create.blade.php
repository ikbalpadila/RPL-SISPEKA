@extends('layouts.app')

@section('content')
<div class="container">

    <h4 class="mb-3">
        Tambah Siswa  
        <small class="text-muted">
            (Kelas {{ $kelas->tingkat }} {{ $kelas->nama_kelas }})
        </small>
    </h4>

    <form method="POST" action="{{ route('admin.siswa.store' ) }}">
        @csrf

        {{-- SIMPAN KELAS --}}
        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

        <div class="mb-3">
            <label class="form-label">NIS</label>
            <input name="nis" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama</label>
            <input name="nama" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="">-- Pilih --</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Wali</label>
            <input name="wali_nama" class="form-control" required>
        </div>

        <button class="btn btn-success">Simpan</button>

        <a href="{{ route('admin.siswa.index', $kelas->id) }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </form>

</div>
@endsection
