@extends('layouts.guru')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="fw-bold">
        Riwayat Absensi — {{ $assignment->kelas->tingkat }} {{ $assignment->kelas->nama_kelas }}
    </h3>

    <a href="{{ route('guru.attendance.create', $assignment->id) }}" class="btn btn-primary btn-sm">
        + Input Absensi Baru
    </a>
</div>

<a href="{{ route('guru.attendance.index', $assignment->id) }}" class="btn btn-secondary btn-sm mb-3">
    ⬅ Kembali ke Halaman Absensi
</a>
</div>

<p class="text-muted">
    Mata Pelajaran: <strong>{{ $assignment->mapel->nama_mapel }}</strong>
</p>

@foreach($attendances as $tanggal => $items)

<div class="card shadow-sm border-0 mb-3">
    <div class="card-body">

        <div class="d-flex justify-content-between align-items-center mb-2">

            <h5 class="fw-semibold mb-0">{{ $tanggal }}</h5>

            <a href="{{ route('guru.attendance.edit', [$assignment->id, $tanggal]) }}"
               class="btn btn-outline-primary btn-sm">
               ✏ Edit
            </a>

        </div>

        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Nama Siswa</th>
                    <th width="160">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($items as $item)
                <tr>
                    <td>{{ $item->siswa->nama }}</td>
                    <td>
                        @if($item->status=='hadir')
                            <span class="badge bg-success">Hadir</span>
                        @elseif($item->status=='izin')
                            <span class="badge bg-warning text-dark">Izin</span>
                        @elseif($item->status=='sakit')
                            <span class="badge bg-info text-dark">Sakit</span>
                        @else
                            <span class="badge bg-danger">Alpa</span>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

@endforeach

@endsection
