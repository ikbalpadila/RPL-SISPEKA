@extends('layouts.wali')

@section('content')
<div class="container-fluid">

    {{-- ================= HEADER ================= --}}
    <div class="mb-4">
        <h4 class="fw-bold mb-1">Dashboard Wali Murid</h4>
        <small class="text-muted">
            Assalamu’alaikum, {{ auth()->user()->name }}
        </small>
    </div>

    {{-- ================= IDENTITAS SISWA ================= --}}
    <div class="mb-3">
        <h5 class="fw-bold">{{ $siswa->nama }}</h5>
        <p class="text-muted mb-0">
            Kelas {{ $siswa->kelas->tingkat }} {{ $siswa->kelas->nama_kelas }}
        </p>
    </div>

    {{-- ================= DATA SISWA ================= --}}
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <small class="text-muted">Nama Siswa</small>
                    <h6 class="fw-bold mb-0">{{ $siswa->nama }}</h6>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <small class="text-muted">Kelas</small>
                    <h6 class="fw-bold mb-0">
                        {{ $siswa->kelas->tingkat }} {{ $siswa->kelas->nama_kelas }}
                    </h6>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <small class="text-muted">Tahun Ajaran</small>
                    <h6 class="fw-bold mb-0">
                        {{ now()->year }}/{{ now()->year + 1 }}
                    </h6>
                </div>
            </div>
        </div>

    </div>

    {{-- ================= RINGKASAN STATUS (SIAP DATA NYATA) ================= --}}
    <div class="row mb-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h6 class="fw-bold">Nilai Akademik</h6>
                    <h4 class="fw-bold mb-0">
                        {{ $rataNilai ? number_format($rataNilai, 1) : '-' }}
                    </h4>
                    <small class="text-muted">Rata-rata nilai</small>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h6 class="fw-bold">Kehadiran</h6>
                    <h4 class="fw-bold mb-0">{{ $persenHadir }}%</h4>
                    <small class="text-muted">Persentase hadir</small>
                </div>
            </div>
        </div>
    
        <div class="col-md-4">
            <div class="card border-0 shadow-sm bg-light">
                <div class="card-body">
                    <h6 class="fw-bold">Perilaku</h6>
                    <h4 class="fw-bold mb-0">{{ $totalPerilaku }}</h4>
                    <small class="text-muted">Total catatan</small>
                </div>
            </div>
        </div>
    
    </div>    

    {{-- ================= MENU UTAMA ================= --}}
    <div class="row g-3">

        <div class="col-md-4">
            <a href="{{ route('wali.behavior.index') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Catatan Perilaku</h6>
                        <small class="text-muted">
                            Riwayat sikap & pembinaan siswa
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('wali.nilai.index') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Nilai Akademik</h6>
                        <small class="text-muted">
                            Hasil belajar dari setiap mata pelajaran
                        </small>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-4">
            <a href="{{ route('wali.absensi.index') }}" class="text-decoration-none">
                <div class="card h-100 shadow-sm border-0 hover-card">
                    <div class="card-body">
                        <h6 class="fw-bold mb-1">Absensi</h6>
                        <small class="text-muted">
                            Rekap kehadiran siswa
                        </small>
                    </div>
                </div>
            </a>
        </div>

    </div>

    {{-- ================= INFO TAMBAHAN ================= --}}
    <div class="mt-4">
        <div class="alert alert-light border">
            <small class="text-muted">
                Data ditampilkan berdasarkan input guru. Jika ada ketidaksesuaian, silakan hubungi wali kelas.
            </small>
        </div>
    </div>

</div>
@endsection
