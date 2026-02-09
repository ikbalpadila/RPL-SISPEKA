@extends('layouts.app')

@section('content')

<h2 class="mb-4 fw-semibold">Dashboard Admin</h2>

<div class="row g-4">

    <!-- Total Guru -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">Total Guru</h6>
                <h3 class="fw-bold">{{ $totalGuru }}</h3>
            </div>
        </div>
    </div>

    <!-- Total Siswa -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">Total Siswa</h6>
                <h3 class="fw-bold">{{ $totalSiswa }}</h3>
            </div>
        </div>
    </div>

    <!-- Total Kelas -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">Total Kelas</h6>
                <h3 class="fw-bold">{{ $totalKelas }}</h3>
            </div>
        </div>
    </div>

    <!-- Total Mapel -->
    <div class="col-md-3">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-body">
                <h6 class="text-muted">Total Mata Pelajaran</h6>
                <h3 class="fw-bold">{{ $totalMapel }}</h3>
            </div>
        </div>
    </div>

</div>

@endsection
