<!DOCTYPE html>
<html>
<head>
    <title>KDH Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">GAGANA Tours Admin</a>
        <a class="btn btn-danger" href="{{ route('admin.logout') }}">Logout</a>
    </div>
</nav>
@yield('content')
</body>
</html>
