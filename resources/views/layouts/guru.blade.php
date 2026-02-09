<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Guru - SISPEKA')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #0d6efd;
            --primary-dark: #003b88;
            --primary-soft: rgba(255,255,255,.15);
            --bg-main: #f3f4f6;
            --border: #e5e7eb;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-main);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: white;
            border-bottom: 1px solid var(--border);
        }

        /* ===== LAYOUT ===== */
        .layout {
            display: flex;
            min-height: calc(100vh - 56px);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 260px;
            background: linear-gradient(180deg, var(--primary), var(--primary-dark));
            color: #fff;
            padding: 20px;
            transition: width .3s ease;
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: 76px;
        }

        /* ===== SIDEBAR HEADER ===== */
        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
        }

        .brand-wrapper {
            white-space: nowrap;
            overflow: hidden;
            transition: opacity .2s ease, width .3s ease;
        }

        .sidebar.collapsed .brand-wrapper {
            width: 0;
            opacity: 0;
        }

        /* ===== MENU ===== */
        .nav-link {
            color: #dbeafe;
            font-weight: 500;
            border-radius: 10px;
            padding: 12px 14px;
            margin-bottom: 6px;
            display: flex;
            align-items: center;
            transition: background .2s ease;
        }

        .nav-link:hover,
        .nav-link.active {
            background: var(--primary-soft);
            color: #fff;
        }

        .menu-text {
            white-space: nowrap;
            transition: opacity .2s ease;
        }

        .sidebar.collapsed .menu-text {
            opacity: 0;
            width: 0;
            overflow: hidden;
        }

        /* ===== CONTENT ===== */
        .content {
            flex: 1;
            padding: 28px;
        }

        .page-card {
            background: white;
            border-radius: 18px;
            padding: 24px;
            box-shadow: 0 12px 28px rgba(0,0,0,.06);
        }

        /* ===== BUTTON ===== */
        .btn-soft {
            background: var(--primary-soft);
            color: white;
            border: none;
            border-radius: 10px;
        }

        /* ===== MOBILE ===== */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 56px;
                left: 0;
                height: 100vh;
                z-index: 1000;
            }

            .sidebar.collapsed {
                transform: translateX(-100%);
                width: 260px;
            }
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar px-4 py-2 d-flex justify-content-between">
    <span class="fw-bold text-primary">SISPEKA</span>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-sm btn-outline-danger">Logout</button>
    </form>
</nav>

{{-- MAIN --}}
<div class="layout">

    {{-- SIDEBAR --}}
    <aside id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <div class="brand-wrapper fw-bold fs-5">
                MENU GURU
            </div>

            <button id="toggleSidebar" class="btn btn-soft btn-sm">☰</button>
        </div>

        <a href="{{ route('guru.dashboard') }}"
           class="nav-link {{ request()->routeIs('guru.dashboard') ? 'active' : '' }}">
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('guru.attendance.index') }}"
           class="nav-link {{ request()->routeIs('guru.attendance.*') ? 'active' : '' }}">
            <span class="menu-text">Absensi</span>
        </a>

        <a href="{{ route('guru.grade.index') }}"
           class="nav-link {{ request()->routeIs('guru.grade.*') ? 'active' : '' }}">
            <span class="menu-text">Nilai</span>
        </a>

        <a href="{{ route('guru.behavior.index') }}"
           class="nav-link {{ request()->routeIs('guru.behavior.*') ? 'active' : '' }}">
            <span class="menu-text">Catatan Perilaku</span>
        </a>
    </aside>

    {{-- CONTENT --}}
    <main class="content">
        <div class="page-card">
            @yield('content')
        </div>
    </main>

</div>

<script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
</script>

</body>
</html>
