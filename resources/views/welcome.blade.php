<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SISPEKA | Sistem Informasi Sekolah</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .container {
            background: #ffffff;
            max-width: 1000px;
            width: 100%;
            border-radius: 18px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 30px 60px rgba(0,0,0,.25);
        }

        /* LEFT */
        .left {
            width: 55%;
            padding: 60px;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 40px;
        }

        .logo img {
            width: 45px;
        }

        .logo span {
            font-size: 22px;
            font-weight: 700;
            color: #4f46e5;
        }

        h1 {
            font-size: 36px;
            margin-bottom: 16px;
            color: #111827;
        }

        p {
            color: #6b7280;
            font-size: 16px;
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .buttons {
            display: flex;
            gap: 15px;
        }

        .btn {
            padding: 14px 28px;
            border-radius: 10px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: .3s;
        }

        .btn-primary {
            background: #4f46e5;
            color: white;
        }

        .btn-primary:hover {
            background: #4338ca;
        }

        .btn-outline {
            border: 2px solid #4f46e5;
            color: #4f46e5;
        }

        .btn-outline:hover {
            background: #4f46e5;
            color: white;
        }

        /* RIGHT */
        .right {
            width: 45%;
            background: linear-gradient(135deg, #4f46e5, #6366f1);
            color: white;
            padding: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .right h2 {
            font-size: 30px;
            margin-bottom: 15px;
        }

        .right ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .right li {
            margin-bottom: 12px;
            font-size: 15px;
        }

        .right li::before {
            content: "✔";
            margin-right: 8px;
        }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .container {
                flex-direction: column;
            }

            .left, .right {
                width: 100%;
            }

            .right {
                text-align: center;
            }
        }
    </style>
</head>
<body>

<div class="container">

    <!-- LEFT -->
    <div class="left">
        <div class="logo">
            <img src="{{ asset('images/sispekalogo.png') }}" alt="SISPEKA">
            <span>SISPEKA</span>
        </div>

        <h1>Sistem Informasi Sekolah Terpadu</h1>
        <p>
            SISPEKA membantu sekolah mengelola data akademik, absensi,
            nilai, dan administrasi secara terpusat, aman, dan modern.
        </p>

        <div class="buttons">
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            <a href="{{ route('register') }}" class="btn btn-outline">Daftar</a>
        </div>
    </div>

    <!-- RIGHT -->
    <div class="right">
        <h2>Kenapa SISPEKA?</h2>
        <ul>
            <li>Manajemen Guru & Siswa</li>
            <li>Absensi & Nilai Terintegrasi</li>
            <li>Akses Berbasis Role</li>
            <li>Data Aman & Terstruktur</li>
        </ul>
    </div>

</div>

</body>
</html>
