@extends('layouts.wali')

@section('content')
<div class="container-fluid">

    <h4 class="fw-bold mb-1">Nilai Akademik</h4>
    <small class="text-muted">
        {{ $siswa->nama }} | Kelas {{ $siswa->kelas->tingkat }} {{ $siswa->kelas->nama_kelas }}
    </small>

    <div class="mt-4">

        @foreach($teachings as $teaching)

        <div class="card shadow-sm mb-4">
            <div class="card-header bg-light">
                <strong>{{ $teaching->mapel->nama_mapel }}</strong>
            </div>

            <div class="card-body table-responsive">
                <table class="table table-bordered text-center align-middle">
                    <thead class="table-dark">
                        <tr>
                            @foreach($gradeTypes as $type)
                                @php
                                    $jumlah = isset($grades[$teaching->id][$type->id])
                                        ? $grades[$teaching->id][$type->id]->count()
                                        : 0;
                                @endphp

                                @for($i = 1; $i <= max(1, $jumlah); $i++)
                                    <th>{{ $type->nama }} {{ $i }}</th>
                                @endfor
                            @endforeach

                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            @foreach($gradeTypes as $type)
                                @php
                                    $list = $grades[$teaching->id][$type->id] ?? collect();
                                @endphp

                                @for($i = 0; $i < max(1, $list->count()); $i++)
                                    <td>
                                        {{ $list[$i]->nilai ?? '-' }}
                                    </td>
                                @endfor
                            @endforeach

                            <td class="fw-bold">
                                {{ $siswa->nilaiAkhir($teaching->id) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @endforeach

        @if($teachings->isEmpty())
            <div class="alert alert-info">
                Belum ada nilai yang diinput oleh guru.
            </div>
        @endif

    </div>

</div>
@endsection
