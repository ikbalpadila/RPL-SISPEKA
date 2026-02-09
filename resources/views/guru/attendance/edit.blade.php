@extends('layouts.guru')

@section('content')

<h3 class="fw-bold mb-2">
    Edit Absensi — {{ $assignment->kelas->tingkat }} {{ $assignment->kelas->nama_kelas }}
</h3>

<p class="text-muted">
    Tanggal: <strong>{{ $attendanceDate }}</strong>
</p>

<div class="mb-3">
    <a href="{{ route('guru.attendance.history', $assignment->id) }}" class="btn btn-secondary btn-sm">
        ← Kembali ke Riwayat
    </a>
</div>

<form action="{{ route('guru.attendance.update', $attendanceDate) }}" method="POST">
@csrf
@method('PUT')

<div class="card shadow-sm border-0">
    <div class="card-body">

        <table class="table table-hover table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="60" class="text-center">No</th>
                    <th>Nama Siswa</th>
                    <th width="220" class="text-center">Status</th>
                </tr>
            </thead>

            <tbody>
                @foreach($records as $row)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $row->siswa->nama }}</td>
                    <td>
                        <select name="attendance[{{ $row->id }}]" class="form-select">

                            <option value="hadir"  {{ $row->status=='hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="izin"   {{ $row->status=='izin' ? 'selected' : '' }}>Izin</option>
                            <option value="sakit"  {{ $row->status=='sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="alpa"  {{ $row->status=='alpa' ? 'selected' : '' }}>Alpa</option>

                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>

    </div>
</div>

<div class="text-end mt-3">
    <button class="btn btn-success">
        Simpan Perubahan
    </button>
</div>

</form>

@endsection
