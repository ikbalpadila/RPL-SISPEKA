@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('admin.gurus.store') }}">
@csrf

<label>NIP</label>
<input name="nip">

<label>Nama</label>
<input name="nama">

<label>Email</label>
<input name="email">

<button>Simpan</button>
</form>
@endsection
