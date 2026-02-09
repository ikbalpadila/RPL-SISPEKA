@extends('layouts.guru')

@section('content')

<div class="card shadow-sm">

    <div class="card-header">
        <h5 class="mb-0">Rekap Nilai</h5>
        <small class="text-muted">
            Kelas: {{ $teaching->kelas->tingkat }} {{ $teaching->kelas->nama_kelas }} |
            Mapel: {{ $teaching->mapel->nama_mapel ?? '-' }}
        </small>
    </div>

    <div class="card-body">
        @php
        $maxKolom = [];
        
        foreach ($gradeTypes as $type) {
            $maxKolom[$type->id] = 0;
        
            foreach ($teaching->kelas->siswas as $siswa) {
                $jumlah = isset($grades[$siswa->id][$type->id])
                    ? $grades[$siswa->id][$type->id]->count()
                    : 0;
        
                $maxKolom[$type->id] = max($maxKolom[$type->id], $jumlah);
            }
        }
        @endphp        

        <form method="POST" action="{{ route('guru.grade.matrix.update', $teaching->id) }}">
            @csrf

            <div class="table-responsive">
                <table class="table table-bordered align-middle">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>NIS</th>
                            <th>Nama</th>

                            @foreach($gradeTypes as $type)
                                @for($i = 1; $i <= max(1, $maxKolom[$type->id]); $i++)
                                    <th>{{ $type->nama }} {{ $i }}</th>
                                @endfor
                            @endforeach

                            <th>Nilai Akhir</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($teaching->kelas->siswas as $siswa)
                        <tr>
                            <td class="text-center">{{ $siswa->nis }}</td>
                            <td>{{ $siswa->nama }}</td>

                        @foreach($gradeTypes as $type)
                            @for($i = 0; $i < max(1, $maxKolom[$type->id]); $i++)
                                @php
                                    $grade = $grades[$siswa->id][$type->id][$i] ?? null;
                                @endphp
                                <td>
                                    <input type="number"
                                        class="form-control text-center"
                                        name="nilai[{{ $grade?->id }}]"
                                        value="{{ $grade?->nilai }}"
                                        min="0" max="100">
                                </td>
                            @endfor
                            @endforeach

                            <td class="text-center fw-bold">
                                {{ $siswa->nilaiAkhir($teaching->id) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-3">
                <a href="{{ route('guru.grade.index') }}" class="btn btn-danger px-4">Kembali</a>
                <button type="submit" class="btn btn-success px-4">Simpan Nilai</button>
                <a href="{{ route('guru.grade.matrix.delete', $teaching->id) }}" 
                    class="btn btn-warning px-4"
                    onclick="return confirm('Hapus semua nilai pada kelas ini?')">
                    Hapus Nilai
                 </a>
                 
            </div>

        </form>

    </div>
</div>

@endsection
