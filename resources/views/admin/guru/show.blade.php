@extends('layouts.app')

@section('content')

<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Detail Guru</h5>
    </div>

    <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th width="200">NIP</th>
                <td>{{ $guru->nip }}</td>
            </tr>
            <tr>
                <th>Nama</th>
                <td>{{ $guru->nama }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>{{ $guru->email }}</td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td>{{ $guru->jenis_kelamin }}</td>
            </tr>
        </table>
    </div>

    <div class="card-footer d-flex gap-2">
        <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary">
            ⬅ Kembali
        </a>
        <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-warning">
            ✏ Edit
        </a>
    </div>
</div>

@endsection
