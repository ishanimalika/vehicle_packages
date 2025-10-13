@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Package</h2>

    <form action="{{ route('packages.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Package Name</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required></textarea>
        </div>

        <div class="mb-3">
            <label>Price (LKR)</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Select Vehicle</label>
            <select name="vehicle_id" class="form-control" required>
                <option value="">-- Select Vehicle --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Select Driver</label>
            <select name="driver_id" class="form-control" required>
                <option value="">-- Select Driver --</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success">Save Package</button>
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
