@extends('layouts.admin')

@section('content')

<div class="card">
    <h2>Laporan Akademik Siswa</h2>
    <p><strong>Nama:</strong> {{ $siswa->nama }}</p>
    <p><strong>NIS:</strong> {{ $siswa->nis }}</p>
    <p><strong>Kelas:</strong> {{ $siswa->kelas->nama_kelas ?? '-' }}</p>

    <a href="{{ route('admin.report.mapel', $siswa->id) }}" class="btn btn-back">
        Kembali
    </a>

    <a href="{{ route('admin.report.export', [
        'siswa' => $siswa->id,
        'mapel' => $mapelId
    ]) }}">
    Export Excel
</a>

</div>

<div class="card">
    <h3>Nilai Akademik</h3>

    @forelse($nilai as $jenis => $items)
        <strong>{{ strtoupper($jenis) }}</strong>
        <table class="table">
            <tr>
                <th>No</th>
                <th>Nilai</th>
            </tr>
            @foreach($items as $i => $n)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $n->nilai }}</td>
            </tr>
            @endforeach
        </table>
        <br>
    @empty
        <p>- Belum ada data nilai</p>
    @endforelse
</div>

<div class="card">
    <h3>Absensi</h3>
    <ul>
        @forelse($absensi as $a)
            <li>
                {{ $a->tanggal }}
                <span class="badge badge-{{ $a->status }}">
                    {{ ucfirst($a->status) }}
                </span>
            </li>
        @empty
            <li>- Belum ada data absensi</li>
        @endforelse
    </ul>
</div>

<div class="card">
    <h3>Catatan Perilaku</h3>
    @forelse($perilaku as $p)
        <div class="card {{ $p->jenis == 'positif' ? 'perilaku-positif' : 'perilaku-negatif' }}">
            <strong>{{ strtoupper($p->jenis) }}</strong>
            <p>{{ $p->catatan }}</p>
        </div>
    @empty
        <p>- Tidak ada catatan perilaku</p>
    @endforelse
</div>

@endsection
