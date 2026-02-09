@extends('layouts.guru')

@section('content')
<h3>Dashboard Guru</h3>
<p>Selamat datang, {{ auth()->user()->name }}</p>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card text-bg-primary">
            <div class="card-body">
                <h5>Kelas Mengajar</h5>
                <h2>{{ auth()->user()->guru->teachingAssignments->count() ?? 0 }}</h2>
            </div>
        </div>
    </div>
</div>
@endsection


