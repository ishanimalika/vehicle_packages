<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">GAGANA Tours Admin</a>
        <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
    </div>
</nav>

<div class="container mt-4">
    <h3>Welcome to Admin Dashboard</h3>

    <div class="row mt-4">
        <!-- Vehicles -->
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Vehicles</h5>
                    <p class="card-text fs-2">{{ $totalVehicles }}</p>
                    <a href="{{ route('vehicles.index') }}" class="btn btn-light btn-sm">Manage Vehicles</a>
                </div>
            </div>
        </div>

        <!-- Packages -->
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Packages</h5>
                    <p class="card-text fs-2">{{ $totalPackages }}</p>
                    <a href="{{ route('packages.index') }}" class="btn btn-light btn-sm">Manage Packages</a>
                </div>
            </div>
        </div>

        <!-- Drivers -->
        <div class="col-md-4">
            <div class="card text-white bg-warning mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Drivers</h5>
                    <p class="card-text fs-2">{{ $totalDrivers }}</p>
                    <a href="{{ route('drivers.index') }}" class="btn btn-light btn-sm">Manage Drivers</a>
                </div>
            </div>
        </div>

        <!-- Bookings -->
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-body">
                    <h5 class="card-title">Total Bookings</h5>
                    <p class="card-text fs-2">{{ \App\Models\Booking::count() }}</p>
                    <a href="{{ route('admin.booking.index') }}" class="btn btn-light btn-sm">View Bookings</a>
                </div>
            </div>
        </div>

    </div>
</div>
</body>
</html>
