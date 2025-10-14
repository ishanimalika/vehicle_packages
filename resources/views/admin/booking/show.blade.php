<!DOCTYPE html>
<html>
<head>
    <title>Booking Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a href="{{ route('admin.booking.index') }}" class="navbar-brand">← Back to Bookings</a>
    </div>
</nav>

<div class="container my-5">
    <h3>Booking Details</h3>
    <div class="card mt-3">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $booking->name }}</p>
            <p><strong>Email:</strong> {{ $booking->email }}</p>
            <p><strong>Phone:</strong> {{ $booking->phone }}</p>
            <p><strong>Pickup:</strong> {{ $booking->pickup_location }}</p>
            <p><strong>Drop-off:</strong> {{ $booking->dropoff_location ?? '-' }}</p>
            <p><strong>Date & Time:</strong> {{ $booking->pickup_date }} {{ $booking->pickup_time }}</p>
            <p><strong>Vehicle:</strong> {{ $booking->vehicle?->vehicle_name ?? '-' }}</p>
            <p><strong>Package:</strong> {{ $booking->package?->title ?? '-' }}</p>
            <p><strong>Notes:</strong> {{ $booking->notes ?? 'N/A' }}</p>
            <p><strong>Status:</strong> <span class="badge bg-info">{{ $booking->status }}</span></p>
        </div>
    </div>
</div>

</body>
</html>
