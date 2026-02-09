<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard Wali')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-soft: #eef2ff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border: #e5e7eb;
            --bg-main: #f4f6f9;
            --bg-white: #ffffff;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-main);
        }

        /* ===== NAVBAR ===== */
        .navbar {
            background: var(--bg-white);
            border-bottom: 1px solid var(--border);
        }

        /* ===== LAYOUT ===== */
        .layout {
            display: flex;
            min-height: calc(100vh - 56px);
        }

        /* ===== SIDEBAR ===== */
        .sidebar {
            width: 240px;
            background: var(--bg-white);
            border-right: 1px solid var(--border);
            padding: 20px;
            transition: width 0.3s ease;
            overflow: hidden;
        }

        .sidebar.collapsed {
            width: 72px;
        }

        /* ===== SIDEBAR HEADER ===== */
        .sidebar-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
        }

        .menu-title-wrapper {
            overflow: hidden;
            white-space: nowrap;
            transition: opacity 0.2s ease, width 0.3s ease;
        }

        .sidebar.collapsed .menu-title-wrapper {
            width: 0;
            opacity: 0;
        }

        /* ===== MENU ===== */
        .sidebar a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-main);
            margin-bottom: 6px;
            transition: background 0.2s ease;
        }

        .sidebar a:hover {
            background: var(--primary-soft);
        }

        .sidebar a.active {
            background: var(--primary-soft);
            color: var(--primary);
            font-weight: 600;
        }

        .menu-text {
            white-space: nowrap;
            transition: opacity 0.2s ease;
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

        /* ===== BUTTON ===== */
        .btn-soft {
            background: var(--primary-soft);
            color: var(--primary);
            border: none;
            border-radius: 10px;
        }

        /* ===== MOBILE ===== */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                z-index: 1000;
                height: 100vh;
                left: 0;
                top: 56px;
            }

            .sidebar.collapsed {
                transform: translateX(-100%);
                width: 240px;
            }
        }
    </style>
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar px-4 py-2 d-flex justify-content-between">
    <span class="fw-bold text-primary">SISPEKA</span>

    <div class="d-flex align-items-center gap-3">
        <span class="text-muted small">{{ auth()->user()->name }}</span>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-sm btn-outline-danger">Logout</button>
        </form>
    </div>
</nav>

{{-- MAIN --}}
<div class="layout">

    {{-- SIDEBAR --}}
    <aside id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <div class="menu-title-wrapper fw-semibold">
                MENU WALI
            </div>

            <button id="toggleSidebar" class="btn btn-soft btn-sm">☰</button>
        </div>

        <a href="{{ route('wali.dashboard') }}" class="{{ request()->routeIs('wali.dashboard') ? 'active' : '' }}">
            <span class="menu-text">Dashboard</span>
        </a>

        <a href="{{ route('wali.nilai.index') }}" class="{{ request()->routeIs('wali.nilai.*') ? 'active' : '' }}">
            <span class="menu-text">Nilai Akademik</span>
        </a>

        <a href="{{ route('wali.absensi.index') }}" class="{{ request()->routeIs('wali.absensi.*') ? 'active' : '' }}">
            <span class="menu-text">Absensi</span>
        </a>

        <a href="{{ route('wali.behavior.index') }}" class="{{ request()->routeIs('wali.behavior.*') ? 'active' : '' }}">
            <span class="menu-text">Perilaku</span>
        </a>
    </aside>

    {{-- CONTENT --}}
    <main class="content">
        @yield('content')
    </main>

</div>

<script>
    document.getElementById('toggleSidebar').addEventListener('click', function () {
        document.getElementById('sidebar').classList.toggle('collapsed');
    });
</script>

</body>
</html>
