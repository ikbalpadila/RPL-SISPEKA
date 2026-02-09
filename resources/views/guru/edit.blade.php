@extends('layouts.admin')

@section('content')
<form method="POST" action="{{ route('admin.gurus.update',$guru->id) }}">
@csrf
@method('PUT')

<input name="nip" value="{{ $guru->nip }}">
<input name="nama" value="{{ $guru->nama }}">
<input name="email" value="{{ $guru->email }}">

<button>Update</button>
</form>
@endsection
