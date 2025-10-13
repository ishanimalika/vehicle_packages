<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">KDH Admin</a>
        <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <h3>Welcome to Admin Dashboard</h3>
    <div class="list-group">
        <a href="{{ route('vehicles.index') }}" class="list-group-item">Manage Vehicles</a>
        <a href="{{ route('packages.index') }}" class="list-group-item">Manage Packages</a>
        <a href="{{ route('drivers.index') }}" class="list-group-item">Manage Drivers</a>
    </div>
</div>
</body>
</html>
