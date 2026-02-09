@extends('layouts.wali')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-3">
        <h4 class="fw-bold mb-1">Absensi Siswa</h4>
        <small class="text-muted">
            {{ $siswa->nama }} | Kelas {{ $siswa->kelas->tingkat }} {{ $siswa->kelas->nama_kelas }}
        </small>
    </div>

    {{-- REKAP --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-success bg-opacity-10">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Hadir</h6>
                    <h3 class="fw-bold text-success">{{ $rekap['hadir'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-warning bg-opacity-10">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Izin</h6>
                    <h3 class="fw-bold text-warning">{{ $rekap['izin'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-info bg-opacity-10">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Sakit</h6>
                    <h3 class="fw-bold text-info">{{ $rekap['sakit'] }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card shadow-sm border-0 bg-danger bg-opacity-10">
                <div class="card-body text-center">
                    <h6 class="fw-bold">Alpa</h6>
                    <h3 class="fw-bold text-danger">{{ $rekap['alpa'] }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- TABEL ABSENSI --}}
    <div class="card shadow-sm border-0">
        <div class="card-body table-responsive">
            <table class="table table-hover align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Tanggal</th>
                        <th>Status</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($attendances as $absen)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d M Y') }}</td>
                        <td>
                            @if($absen->status == 'hadir')
                                <span class="badge bg-success">Hadir</span>
                            @elseif($absen->status == 'izin')
                                <span class="badge bg-warning text-dark">Izin</span>
                            @elseif($absen->status == 'sakit')
                                <span class="badge bg-info">Sakit</span>
                            @else
                                <span class="badge bg-danger">Alpa</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2" class="text-muted">
                            Belum ada data absensi
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection
