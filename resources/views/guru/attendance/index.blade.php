@extends('layouts.guru')

@section('content')
<h4>Pilih Kelas</h4>

@foreach($assignments as $a)
    <a href="{{ route('guru.attendance.create',$a->id) }}"
       class="btn btn-primary mb-2">
        {{ $a->kelas->tingkat }} {{ $a->kelas->nama_kelas }} - {{ $a->mapel->nama }}
    </a>
@endforeach
@endsection
