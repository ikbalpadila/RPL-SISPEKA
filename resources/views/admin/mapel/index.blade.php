@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Mata Pelajaran</h4>

        <a href="{{ route('admin.mapel.create') }}"
           class="btn btn-success">
            + Tambah Mapel
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th width="150">Kode Mapel</th>
                <th>Nama Mata Pelajaran</th>
                <th width="150">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mapels as $m)
            <tr>
                <td>{{ $m->kode_mapel }}</td>
                <td>{{ $m->nama_mapel }}</td>
                <td>
                    <a href="{{ route('admin.mapel.edit', $m->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>
                    
                    <form action="{{ route('admin.mapel.destroy', $m->id) }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button onclick="return confirm('Hapus mapel ini?')"
                                class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>
                   
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="3" class="text-center text-muted">
                    Belum ada data mata pelajaran
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
