<!DOCTYPE html>
<html>
<head>
    <title>KDH Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
@php
    // Use admin guard safely
    $admin = auth('admin')->user();
@endphp

<nav class="navbar navbar-dark bg-dark">
    <div class="container d-flex justify-content-between align-items-center">
        <a class="navbar-brand" href="{{ route('admin.dashboard') }}">GAGANA Tours Admin</a>

        <div class="d-flex align-items-center gap-3">
            {{-- 🔔 Notification Dropdown --}}
            @if($admin)
                <div class="dropdown">
                    <button class="btn btn-outline-light position-relative" id="notifDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell"></i>
                        @if($admin->unreadNotifications->count() > 0)
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                {{ $admin->unreadNotifications->count() }}
                            </span>
                        @endif
                    </button>

                    <ul class="dropdown-menu dropdown-menu-end shadow">
                        @forelse($admin->unreadNotifications as $notification)
                            <li class="dropdown-item small">
                                <strong>New Booking:</strong> {{ $notification->data['name'] ?? 'Customer' }}<br>
                                <span class="text-muted">{{ $notification->created_at->diffForHumans() }}</span>
                            </li>
                        @empty
                            <li class="dropdown-item text-muted">No new notifications</li>
                        @endforelse
                    </ul>
                </div>
            @endif

            {{-- 🔓 Logout --}}
            <a class="btn btn-danger" href="{{ route('admin.logout') }}">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
