@extends('layouts.app')

@section('content')
<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Data Teaching Assignment</h4>

        <a href="{{ route('admin.teaching_assignments.create') }}"
           class="btn btn-success">
            + Tambah Teaching Assignment
        </a>
    </div>

    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Guru</th>
                <th>Mata Pelajaran</th>
                <th>Tingkat</th>
                <th>Kelas</th>
                <th width="180">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($teaching_assignments as $assignment)
            <tr>
                <td>{{ $assignment->guru->nama ?? '-' }}</td>
                <td>{{ $assignment->mapel->nama_mapel ?? '-' }}</td>
                <td>{{ $assignment->kelas->tingkat ?? '-' }}</td>
                <td>{{ $assignment->kelas->nama_kelas ?? '-' }}</td>
                <td class="d-flex gap-1">

                    <a href="{{ route('admin.teaching_assignments.edit', $assignment->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('admin.teaching_assignments.destroy', $assignment->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger btn-sm">
                            Hapus
                        </button>
                    </form>

                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center text-muted">
                    Belum ada data teaching assignment
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection
