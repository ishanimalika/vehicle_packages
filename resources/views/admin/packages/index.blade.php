@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>All Packages</h2>

    <a href="{{ route('packages.create') }}" class="btn btn-primary mb-3">+ Add New Package</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Package Name</th>
                <th>Price (LKR)</th>
                <th>Description</th>
                <th>Vehicle</th>
                <th>Driver</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($packages as $package)
                <tr>
                    <td>{{ $package->id }}</td>
                    <td>{{ $package->title }}</td>
                    <td>{{ number_format($package->price, 2) }}</td>
                    <td>{{ $package->description }}</td>
                    <td>{{ $package->vehicle->name ?? 'N/A' }}</td>
                    <td>{{ $package->driver->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('packages.edit', $package->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this package?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="8" class="text-center">No packages found</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
