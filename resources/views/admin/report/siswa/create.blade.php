<form method="POST" action="{{ route('admin.siswas.store') }}">
    @csrf
    
    <input name="nis">
    <input name="nama">
    
    <select name="kelas_id">
    @foreach($kelas as $k)
    <option value="{{ $k->id }}">{{ $k->nama_kelas }}</option>
    @endforeach
    </select>
    
    <input name="nama_wali" placeholder="Nama Wali">
    
    <button>Simpan</button>
    </form>
    