@extends('layouts.app')

@section('content')
<div class="container">

    <h4 class="mb-4">Edit Teaching Assignment</h4>

    <form method="POST"
          action="{{ route('admin.assignments.update', $assignment->id) }}">
        @csrf
        @method('PUT')

        {{-- GURU --}}
        <div class="mb-3">
            <label class="form-label">Guru</label>
            <select name="guru_id" class="form-control" required>
                <option value="">-- Pilih Guru --</option>
                @foreach($gurus as $guru)
                    <option value="{{ $guru->id }}"
                        {{ $assignment->guru_id == $guru->id ? 'selected' : '' }}>
                        {{ $guru->nama }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- MAPEL --}}
        <div class="mb-3">
            <label class="form-label">Mata Pelajaran</label>
            <select name="mapel_id" class="form-control" required>
                <option value="">-- Pilih Mapel --</option>
                @foreach($mapels as $mapel)
                    <option value="{{ $mapel->id }}"
                        {{ $assignment->mapel_id == $mapel->id ? 'selected' : '' }}>
                        {{ $mapel->nama_mapel }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- KELAS --}}
        <div class="mb-3">
            <label class="form-label">Kelas</label>
            <select name="kelas_id" class="form-control" required>
                <option value="">-- Pilih Kelas --</option>
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}"
                        {{ $assignment->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->tingkat }} {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- BUTTON --}}
        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('admin.assignments.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>
@endsection
