<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>SISPEKA</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
* {
    box-sizing: border-box;
    font-family: 'Segoe UI', sans-serif;
}

body {
    margin: 0;
    min-height: 100vh;
    background: linear-gradient(135deg, #5048f1, #373889);
    display: flex;
    justify-content: center;
    align-items: center;
    overflow: hidden;
}

/* ===== ANIMASI BUKA HALAMAN ===== */
.page {
    width: 950px;
    max-width: 95%;
    animation: openPage 0.9s ease;
}

@keyframes openPage {
    from {
        opacity: 0;
        transform: translateX(var(--from));
    }
    to {
        opacity: 1;
        transform: translateX(0);
    }
}

/* CARD UTAMA */
.card {
    display: flex;
    background: #fff;
    border-radius: 18px;
    overflow: hidden;
    box-shadow: 0 30px 70px rgba(0,0,0,.25);
}

/* PANEL */
.panel {
    width: 50%;
    padding: 45px;
}

.panel.welcome {
    background: linear-gradient(135deg,#6366f1,#4f46e5);
    color: white;
    display: flex;
    flex-direction: column;
    align-items: center;
    text-align: center;
}

/* LOGO */
.welcome-logo {
    flex: 0.75;
    display: flex;
    align-items: center;
    justify-content: center;
}

/* LOGO */
.logo-sispeka {
    width: 230px; /* BESAR & JELAS */
    height: auto;
    object-fit: contain;
    opacity: 0.97;
}
/* TEKS DI BAWAH */
.welcome-text {
    margin-top: -60px;   /* NAIKKAN TEKS DEKAT LOGO */
    margin-bottom: 20px;
}

.welcome-text h1 {
    font-size: 30px;
    font-weight: 400;
    margin-bottom: 10px; /* JANGAN BESAR */
}

.welcome-text p {
    font-size: 16px;
    opacity: 0.9;
}

/* FORM */
label {
    font-weight: 600;
    margin-top: 14px;
    display: block;
}

input, select {
    width: 100%;
    padding: 11px;
    margin-top: 6px;
    border-radius: 8px;
    border: 1px solid #ccc;
}

button {
    margin-top: 20px;
    width: 100%;
    padding: 12px;
    border: none;
    background: #4f46e5;
    color: #fff;
    border-radius: 8px;
    cursor: pointer;
}

button:hover {
    background: #4338ca;
}

.link {
    margin-top: 15px;
    text-align: center;
}

.link a {
    font-weight: 600;
    color: #4f46e5;
    text-decoration: none;
}

/* RESPONSIVE */
@media(max-width:900px){
    .card { flex-direction: column; }
    .panel.welcome { display:none; }
}

</style>
</head>

<body>
@yield('content')
</body>
</html>
