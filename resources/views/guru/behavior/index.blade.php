@extends('layouts.guru')

@section('content')
<div class="card shadow-sm">

    {{-- HEADER --}}
    <div class="card-header d-flex justify-content-between align-items-center">
        <div>
            <h5 class="mb-0">Catatan Perilaku Siswa</h5>
            <small class="text-muted">
                Daftar catatan perilaku siswa yang telah diinput
            </small>
        </div>

        <a href="{{ route('guru.behavior.create') }}" class="btn btn-sm btn-primary">
            + Tambah Catatan
        </a>
    </div>

    {{-- FILTER KELAS --}}
    <div class="card-body border-bottom">
        <form method="GET">
            <div class="row g-2">
                <div class="col-md-4">
                    <select name="kelas_id" class="form-select" onchange="this.form.submit()">
                        <option value="">-- Semua Kelas --</option>
                        @foreach ($kelasList as $kelas)
                            <option value="{{ $kelas->id }}"
                                {{ request('kelas_id') == $kelas->id ? 'selected' : '' }}>
                                {{ $kelas->tingkat }} {{ $kelas->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </form>
    </div>

    {{-- TABLE --}}
    <div class="card-body">

        <table class="table table-bordered table-striped align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Jenis</th>
                    <th>Catatan</th>
                    <th>Tanggal</th>
                    <th width="110">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($notes as $note)
                    <tr>
                        <td>{{ $note->siswa->nama }}</td>

                        <td>
                            {{ $note->siswa->kelas->tingkat }}
                            {{ $note->siswa->kelas->nama_kelas }}
                        </td>

                        <td>
                            <span class="badge
                                @if ($note->jenis === 'positif') bg-success
                                @elseif ($note->jenis === 'negatif') bg-danger
                                @else bg-warning
                                @endif
                            ">
                                {{ ucfirst($note->jenis) }}
                            </span>
                        </td>

                        <td>{{ $note->catatan }}</td>

                        <td>
                            {{ \Carbon\Carbon::parse($note->tanggal)->format('d M Y') }}
                        </td>

                        <td>
                            <form
                                action="{{ route('guru.behavior.destroy', $note->id) }}"
                                method="POST"
                                onsubmit="return confirm('Yakin ingin menghapus catatan ini?')"
                            >
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger w-100">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada catatan perilaku.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>
@endsection
