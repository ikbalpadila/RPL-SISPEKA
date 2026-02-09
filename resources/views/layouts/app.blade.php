<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SISPEKA</title>

    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    @include('layouts.navbar')

    <div class="container-fluid">
        <div class="row">
            @include('layouts.sidebar')

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- BOOTSTRAP JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        /* NAVBAR SISPEKA */
        .navbar-sispeka {
            background: #ffffff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 2px 6px rgba(0,0,0,0.06);
        }

        /* LOGO */
        .logo-sispeka {
            height: 42px;
            width: auto;
        }

        /* BUTTON LOGOUT */
        .btn-logout {
            background-color: #dc2626; /* merah tegas */
            color: #ffffff;
            border-radius: 6px;
            padding: 6px 14px;
            font-weight: 500;
            border: none;
        }

        .btn-logout:hover {
            background-color: #b91c1c;
            color: #ffffff;
        }

        .sispeka-tagline {
            font-size: 0.875rem;
            color: #0f2a42;
            font-style: italic;
            margin-right: 16px;
        }

        /* =========================
   SIDEBAR SISPEKA
========================= */

.sidebar {
    width: 240px;
    min-height: 100vh;
    background-color: #ffffff;
    border-right: 1px solid #e5e7eb;
    transition: width 0.3s ease;
    overflow-x: hidden;
}

/* COLLAPSED */
.sidebar.collapsed {
    width: 72px;
}

/* INNER */
.sidebar-inner {
    padding-top: 8px;
}

/* HEADER */
.sidebar-header {
    padding: 14px 16px;
    border-bottom: 1px solid #e5e7eb;
}

.sidebar-title {
    font-size: 0.75rem;
    font-weight: 700;
    letter-spacing: 0.08em;
    color: #1e3a8a;
}

/* TOGGLE BUTTON */
.btn-toggle {
    border: none;
    background: transparent;
    font-size: 1.1rem;
    color: #475569;
}

.btn-toggle:hover {
    color: #1e40af;
}

/* SECTION */
.sidebar-section {
    margin: 20px 16px 8px;
    font-size: 0.7rem;
    font-weight: 700;
    color: #94a3b8;
    text-transform: uppercase;
}

/* NAV LINK */
.sidebar .nav-link {
    padding: 10px 16px;
    margin: 4px 10px;
    border-radius: 10px;
    color: #334155;
    font-weight: 500;
    transition: all 0.25s ease;
}

/* HOVER */
.sidebar .nav-link:hover {
    background-color: #f1f5f9;
    color: #1e40af;
}

/* ACTIVE */
.sidebar .nav-link.active {
    background-color: #1e40af;
    color: #ffffff;
    font-weight: 600;
}

/* COLLAPSED TEXT HIDE */
.sidebar.collapsed .nav-link,
.sidebar.collapsed .sidebar-section,
.sidebar.collapsed .sidebar-title {
    font-size: 0;
    padding-left: 0;
    padding-right: 0;
    text-align: center;
}

/* =========================
   MAIN CONTENT SHIFT
========================= */

main {
    transition: margin-left 0.3s ease;
}

        </style>

    <script>
        document.getElementById('toggleSidebar').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('collapsed');
        });
    </script>

        
    </body>
</html>
