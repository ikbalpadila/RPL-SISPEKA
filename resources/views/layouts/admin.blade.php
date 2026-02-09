<!DOCTYPE html>
<html>
<head>
    <title>SISPEKA - Admin</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>

<div class="container">
    <h1>SISPEKA Admin</h1>

    @if(session('success'))
        <div class="card">
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

</body>
</html>
