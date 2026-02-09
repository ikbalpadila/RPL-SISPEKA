<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar collapse">
    <div class="sidebar-inner">

        <!-- SIDEBAR HEADER -->
        <div class="sidebar-header d-flex align-items-center justify-content-between">
            <span class="sidebar-title">MENU UTAMA</span>
            <button id="toggleSidebar" class="btn btn-sm btn-toggle">
                ☰
            </button>
        </div>

        <ul class="nav flex-column px-2 mt-3">

            <li class="nav-item">
                <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                    Dashboard
                </a>
            </li>

            <li class="sidebar-section">MASTER DATA</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.guru.index') }}">Guru</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.siswa.kelas') }}">
                    Siswa
                </a>  
            </li>  

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.kelas.index') }}">Kelas</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.mapel.index') }}">Mata Pelajaran</a>
            </li>

            <li class="sidebar-section">AKADEMIK</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.assignments.index') }}">
                    Penugasan Mengajar
                </a>
            </li>

            <li class="sidebar-section">LAPORAN</li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.report.index') }}">Laporan Siswa</a>
            </li>

        </ul>
    </div>
</nav>
