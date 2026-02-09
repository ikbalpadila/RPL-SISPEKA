@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="mb-4">Daftar Kelas</h4>

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Tingkat</th>
                <th>Nama Kelas</th>
                <th>Jumlah Siswa</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
            <tr>
                <td>{{ $k->tingkat }}</td>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->siswas_count }}</td>
                <td>
                    <a href="{{ route('admin.siswa.index', $k->id) }}"
                       class="btn btn-primary btn-sm">
                        Lihat Data Siswa
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
