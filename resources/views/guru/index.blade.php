@extends('layouts.admin')

@section('content')
<a href="{{ route('admin.gurus.create') }}">+ Tambah Guru</a>

<table border="1" width="100%">
<tr>
    <th>NIP</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Aksi</th>
</tr>

@foreach($gurus as $guru)
<tr>
    <td>{{ $guru->nip }}</td>
    <td>{{ $guru->nama }}</td>
    <td>{{ $guru->email }}</td>
    <td>
        <a href="{{ route('admin.gurus.edit',$guru->id) }}">Edit</a>
    </td>
</tr>
@endforeach
</table>
@endsection
