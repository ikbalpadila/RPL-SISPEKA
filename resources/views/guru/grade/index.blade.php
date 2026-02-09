@extends('layouts.guru')

@section('content')

<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Input & Rekap Nilai Siswa</h5>
        <small class="text-muted">Silakan pilih kelas dan mata pelajaran</small>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th style="width: 30%">Kelas</th>
                        <th style="width: 30%">Mata Pelajaran</th>
                        <th style="width: 40%">Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($assignments as $a)
                        <tr>
                            <td>
                                {{ $a->kelas->tingkat }}
                                {{ $a->kelas->nama_kelas }}
                            </td>

                            <td>
                                {{ $a->mapel->nama_mapel ?? '-' }}
                            </td>

                            <td class="text-center">

                                <div class="d-flex justify-content-center align-items-center gap-2">
                            
                                    <a href="{{ route('guru.grade.create', $a->id) }}"
                                       class="btn btn-primary fw-bold shadow-sm px-3">
                                       Input Nilai
                                    </a>
                            
                                    <a href="{{ route('guru.grade.matrix', $a->id) }}"
                                       class="btn btn-success fw-bold shadow-sm px-3">
                                       Rekap Nilai (Matrix)
                                    </a>
                            
                                </div>
                            
                            </td>
                            
                        </tr>

                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                Belum ada data penugasan mengajar.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

@endsection
