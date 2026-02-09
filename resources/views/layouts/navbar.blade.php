<nav class="navbar navbar-sispeka px-3">
    <div class="d-flex align-items-center gap-3">

        <img src="/images/sispeka.png" class="logo-sispeka" alt="SISPEKA">

        <span class="sispeka-tagline d-none d-md-block">
            Sistem Informasi Akademik Terpadu
        </span>
    </div>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-logout">Logout</button>
    </form>
</nav>

