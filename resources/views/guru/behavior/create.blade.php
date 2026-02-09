@extends('layouts.guru')

@section('content')

<div class="card shadow-sm">
    <div class="card-header">
        <h5 class="mb-0">Tambah Catatan Perilaku</h5>
    </div>

    <div class="card-body">

        {{-- FORM FILTER KELAS --}}
        <form method="GET" action="{{ route('guru.behavior.create') }}">
            <div class="mb-3">
                <label class="form-label">Kelas</label>
                <select name="kelas_id" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Pilih Kelas --</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}"
                            {{ $kelasId == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->tingkat }} {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>
        </form>

        <hr>

        {{-- FORM SIMPAN CATATAN --}}
        <form method="POST" action="{{ route('guru.behavior.store') }}">
            @csrf

            <input type="hidden" name="kelas_id" value="{{ $kelasId }}">

            {{-- PILIH SISWA --}}
            <div class="mb-3">
                <label class="form-label">Siswa</label>
                <select name="siswa_id" class="form-select" required>
                    <option value="">-- Pilih Siswa --</option>

                    @forelse ($siswas as $siswa)
                        <option value="{{ $siswa->id }}">
                            {{ $siswa->nama }}
                        </option>
                    @empty
                        <option disabled>
                            Pilih kelas terlebih dahulu
                        </option>
                    @endforelse
                </select>
            </div>

            {{-- JENIS --}}
            <div class="mb-3">
                <label class="form-label">Jenis Perilaku</label>
                <select name="jenis" class="form-select" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="positif">Positif</option>
                    <option value="negatif">Negatif</option>
                    <option value="pembinaan">Pembinaan</option>
                </select>
            </div>

            {{-- CATATAN --}}
            <div class="mb-3">
                <label class="form-label">Catatan</label>
                <textarea name="catatan" class="form-control" rows="3" required></textarea>
            </div>

            {{-- TANGGAL --}}
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal"
                       class="form-control"
                       value="{{ date('Y-m-d') }}"
                       required>
            </div>

            <div class="d-flex justify-content-end gap-2">
                <a href="{{ route('guru.behavior.index') }}" class="btn btn-secondary">
                    Kembali
                </a>

                <button class="btn btn-success"
                    {{ empty($siswas) ? 'disabled' : '' }}>
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
