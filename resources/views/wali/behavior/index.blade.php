@extends('layouts.wali')

@section('content')
<div class="container-fluid">

    {{-- HEADER --}}
    <div class="mb-3">
        <h4 class="fw-bold mb-1">Catatan Perilaku Siswa</h4>
        <small class="text-muted">
            {{ $siswa->nama }} | Kelas {{ $siswa->kelas->tingkat }} {{ $siswa->kelas->nama_kelas }}
        </small>
    </div>

    {{-- LIST CATATAN --}}
    <div class="row">
        @forelse($behaviors as $note)
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm border-0 h-100">

                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center mb-2">

                        {{-- JENIS --}}
                        @if($note->jenis == 'positif')
                            <span class="badge bg-success">Perilaku Positif</span>
                        @elseif($note->jenis == 'negatif')
                            <span class="badge bg-danger">Perilaku Negatif</span>
                        @else
                            <span class="badge bg-warning text-dark">Pembinaan</span>
                        @endif

                        {{-- TANGGAL --}}
                        <small class="text-muted">
                            {{ \Carbon\Carbon::parse($note->tanggal)->format('d M Y') }}
                        </small>
                    </div>

                    {{-- CATATAN --}}
                    <p class="mb-3">
                        {{ $note->catatan }}
                    </p>

                    {{-- GURU --}}
                    <small class="text-muted">
                        Dicatat oleh: {{ $note->guru->name ?? 'Guru' }}
                    </small>
                </div>

            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-light border text-center">
                <small class="text-muted">
                    Belum ada catatan perilaku dari guru.
                </small>
            </div>
        </div>
        @endforelse
    </div>

</div>
@endsection
