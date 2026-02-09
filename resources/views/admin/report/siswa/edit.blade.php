@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('admin.siswas.update',$siswa->id) }}">
@csrf
@method('PUT')

<label>NIS</label>
<input name="nis" value="{{ $siswa->nis }}">

<label>Nama</label>
<input name="nama" value="{{ $siswa->nama }}">

<label>Kelas</label>
<select name="kelas_id">
@foreach($kelas as $k)
<option value="{{ $k->id }}" 
    {{ $siswa->kelas_id == $k->id ? 'selected' : '' }}>
    {{ $k->nama_kelas }}
</option>
@endforeach
</select>

<label>Nama Wali</label>
<input name="nama_wali" value="{{ $siswa->nama_wali }}">

<button>Update</button>
</form>
@endsection
