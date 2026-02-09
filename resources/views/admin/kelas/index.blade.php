@extends('layouts.app')

@section('content')

<div class="d-flex justify-content-between mb-3">
    <h3>Data Kelas</h3>
    <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary">
        + Tambah Kelas
    </a>
</div>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Tingkat</th>
            <th>Nama Kelas</th>
            <th>Kelas Lengkap</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($kelas as $index => $k)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $k->tingkat }}</td>
            <td>{{ $k->nama_kelas }}</td>
            <td><strong>{{ $k->tingkat }} {{ $k->nama_kelas }}</strong></td>
            <td>
                <a href="{{ route('admin.kelas.edit', $k->id) }}" class="btn btn-sm btn-warning">
                    Edit
                </a>

                <form action="{{ route('admin.kelas.destroy', $k->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Hapus kelas ini?')" class="btn btn-sm btn-danger">
                        Hapus
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
