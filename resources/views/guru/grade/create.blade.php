@extends('layouts.guru')

@section('content')
<h4>
Input Nilai {{ $assignment->mapel->nama }} <br>
Kelas {{ $assignment->kelas->tingkat }} {{ $assignment->kelas->nama_kelas }}
</h4>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="mb-3">
    <label for="tanggal_input" class="form-label">Tanggal Penilaian</label>

    <input type="date"
           name="tanggal_input"
           id="tanggal_input"
           class="form-control"
           value="{{ date('Y-m-d') }}">
           
    <small class="text-muted">
        Biarkan default jika penilaian dilakukan hari ini
    </small>
</div>

<form method="POST">
@csrf

<div class="mb-3">
    <label>Jenis Nilai</label>
    <select name="grade_type_id" class="form-control" required>
        @foreach($gradeTypes as $type)
            <option value="{{ $type->id }}">
                {{ $type->nama }} ({{ $type->bobot }}%)
            </option>
        @endforeach
    </select>
</div>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>
        @foreach($assignment->kelas->siswas as $siswa)
        <tr>
            <td>{{ $siswa->nis }}</td>
            <td>{{ $siswa->nama }}</td>
            <td>
                <input type="number"
                       name="nilai[{{ $siswa->id }}]"
                       class="form-control"
                       min="0" max="100" required>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<button class="btn btn-success">Simpan Nilai</button>
<a href="{{ route('guru.grade.index') }}"
   class="btn btn-secondary">
   Kembali
</a>

@if(session('hasilNilaiAkhir'))
<div class="alert alert-info">
    <b>Nilai Akhir Siswa:</b>
    <ul>
        @foreach($assignment->kelas->siswas as $siswa)
            <li>
                {{ $siswa->nama }} :
                {{ session('hasilNilaiAkhir')[$siswa->id] ?? 'Belum lengkap' }}
            </li>
        @endforeach
    </ul>
</div>
@endif


</form>
@endsection
