@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Data Guru</h3>
    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
        + Tambah Guru
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>NIP</th>
            <th>Nama</th>
            <th>Email</th>
            <th>JK</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($gurus as $guru)
        <tr>
            <td>{{ $guru->nip }}</td>
            <td>{{ $guru->nama }}</td>
            <td>{{ $guru->email }}</td>
            <td>{{ $guru->jenis_kelamin }}</td>
            <td>
                <a href="{{ route('admin.guru.show', $guru->id) }}" 
                    class="btn btn-sm btn-info">
                     Lihat
                 </a>
             
                 <a href="{{ route('admin.guru.edit', $guru->id) }}" 
                    class="btn btn-sm btn-warning">
                     Edit
                 </a>
             
                 <form action="{{ route('admin.guru.destroy', $guru->id) }}" 
                       method="POST" class="d-inline">
                     @csrf
                     @method('DELETE')
                     <button onclick="return confirm('Hapus guru ini?')" 
                             class="btn btn-sm btn-danger">
                         Hapus
                     </button>
                </form>
                <form action=""></form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
