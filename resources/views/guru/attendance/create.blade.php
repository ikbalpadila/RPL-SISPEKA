@extends('layouts.guru')

@section('content')

<h3 class="fw-bold mb-3">
    Absensi Kelas {{ $assignment->kelas->tingkat }} {{ $assignment->kelas->nama_kelas }}
</h3>

<div class="mb-3 d-flex gap-2">

    <a href="{{ route('guru.attendance.index') }}" class="btn btn-secondary btn-sm">
        ← Kembali
    </a>

    <a href="{{ route('guru.attendance.history', $assignment->id) }}" class="btn btn-outline-primary btn-sm">
        📜 Riwayat Absensi
    </a>

</div>

<form action="{{ route('guru.attendance.store', $assignment->id) }}" method="POST">
@csrf

<div class="card shadow-sm border-0">
    <div class="card-body">

        <div class="row mb-3">
            <div class="col-md-4">
                <label class="fw-semibold mb-1">Tanggal Absensi</label>
                <input type="date" name="tanggal" class="form-control" required>
            </div>
        </div>

        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr class="text-center">
                    <th width="60">No</th>
                    <th>Nama Siswa</th>
                    <th width="220">Status Kehadiran</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $item)
                <tr>
                    <td class="text-center">{{ $loop->iteration }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>
                        <select name="attendance[{{ $item->id }}]" class="form-select">
                            <option value="hadir">Hadir</option>
                            <option value="izin">Izin</option>
                            <option value="sakit">Sakit</option>
                            <option value="alpa">Alpa</option>
                        </select>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

<div class="text-end mt-3">
    <button class="btn btn-primary">
        Simpan Absensi
    </button>
</div>

</form>

@endsection
