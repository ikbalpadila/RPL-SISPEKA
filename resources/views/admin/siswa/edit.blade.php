@extends('layouts.app')

@section('content')

<h3>Edit Siswa</h3>

<form method="POST" action="{{ route('admin.siswa.update', $siswa->id) }}">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label>NIS</label>
        <input name="nis" class="form-control" value="{{ old('nis', $siswa->nis) }}" required>
    </div>

    <div class="mb-3">
        <label>Nama</label>
        <input name="nama" class="form-control" value="{{ old('nama', $siswa->nama) }}" required>
    </div>

    <div class="mb-3">
        <label>Tanggal Lahir</label>
        <input type="date"
               name="tanggal_lahir"
               class="form-control"
               value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
               required>
    </div>

    <div class="mb-3">
        <label>Kelas</label>
        <select name="kelas_id" class="form-control" required>
            @foreach($kelas as $k)
                <option value="{{ $k->id }}"
                    {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>
                    {{ $k->tingkat }} {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label>Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-control" required>
            <option value="L" {{ old('jenis_kelamin',$siswa->jenis_kelamin)=='L'?'selected':'' }}>
                Laki-laki
            </option>
            <option value="P" {{ old('jenis_kelamin',$siswa->jenis_kelamin)=='P'?'selected':'' }}>
                Perempuan
            </option>
        </select>
    </div>

    <div class="mb-3">
        <label>Nama Wali</label>
        <input name="wali_nama"
               class="form-control"
               value="{{ old('wali_nama', $siswa->wali_nama) }}"
               required>
    </div>

    <button class="btn btn-primary">Update</button>
    <a href="{{ route('admin.siswa.index', $siswa->kelas_id) }}">Kembali</a>

</form>
@endsection
