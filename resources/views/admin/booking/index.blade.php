<!DOCTYPE html>
<html>
<head>
    <title>Bookings - Admin Dashboard</title>
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
    <h3>All Vehicle Bookings</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($bookings->isEmpty())
        <p>No bookings available.</p>
    @else
        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Pickup</th>
                    <th>Date & Time</th>
                    <th>Vehicle</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookings as $booking)
                    <tr>
                        <td>{{ $booking->id }}</td>
                        <td>{{ $booking->name }}</td>
                        <td>{{ $booking->phone }}</td>
                        <td>{{ $booking->pickup_location }}</td>
                        <td>{{ $booking->pickup_date }} {{ $booking->pickup_time }}</td>
                        <td>{{ $booking->vehicle?->name ?? '-' }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.updateStatus', $booking->id) }}" method="POST" class="d-flex align-items-center gap-2">
                                @csrf
                                <select name="status" class="form-select form-select-sm w-auto" onchange="this.form.submit()">
                                    <option value="Pending" {{ $booking->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="Confirmed" {{ $booking->status == 'Confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="Completed" {{ $booking->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                    <option value="Cancelled" {{ $booking->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            <a href="{{ route('admin.booking.show', $booking->id) }}" class="btn btn-sm btn-info">View</a>
                            <form action="{{ route('admin.booking.destroy', $booking->id) }}" method="POST" style="display:inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this booking?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
</div>
</body>
</html>
