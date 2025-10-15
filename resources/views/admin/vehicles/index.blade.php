@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h3>All Vehicles</h3>
    <a href="{{ route('vehicles.create') }}" class="btn btn-primary mb-3">+ Add New Vehicle</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Number Plate</th>
                <th>Seats</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->name }}</td>
                <td>{{ $vehicle->type }}</td>
                <td>{{ $vehicle->number_plate }}</td>
                <td>{{ $vehicle->seats }}</td>
                <td>
                    @if($vehicle->image)
                        <img src="{{ asset('uploads/vehicles/' . $vehicle->image) }}" width="80">
                    @endif
                </td>
                <td>
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this vehicle?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
