<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
</head>
<body>

<h1>Selamat datang, {{ Session::get('admin') }}!</h1>
<p>Ini adalah dashboard admin SINTA.</p>

<a href="{{ route('admin.logout') }}">Logout</a>

</body>
</html>
