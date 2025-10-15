@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>All Drivers</h2>

    <a href="{{ route('drivers.create') }}" class="btn btn-primary mb-3">+ Add New Driver</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle">
        <thead>
            <tr>
                <th>ID</th>
                <th>Photo</th>
                <th>Name</th>
                <th>License Number</th>
                <th>Phone</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($drivers as $driver)
                <tr>
                    <td>{{ $driver->id }}</td>
                    <td>
                        @if($driver->photo)
                            <img src="{{ asset('uploads/drivers/' . $driver->photo) }}" width="60" class="rounded">
                        @else
                            <span class="text-muted">No Photo</span>
                        @endif
                    </td>
                    <td>{{ $driver->name }}</td>
                    <td>{{ $driver->license_no }}</td>
                    <td>{{ $driver->phone }}</td>
                    <td>
                        <a href="{{ route('drivers.edit', $driver->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('drivers.destroy', $driver->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this driver?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6" class="text-center text-muted">No drivers found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
