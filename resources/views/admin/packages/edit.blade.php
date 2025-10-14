@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Package</h2>

    <form action="{{ route('packages.update', $package->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Package Name</label>
            <input type="text" name="package_name" class="form-control" value="{{ $package->title }}" required>
        </div>

        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $package->description }}</textarea>
        </div>

        <div class="mb-3">
            <label>Price (LKR)</label>
            <input type="number" name="price" class="form-control" value="{{ $package->price }}" required>
        </div>

        <div class="mb-3">
            <label>Select Vehicle</label>
            <select name="vehicle_id" class="form-control" required>
                <option value="">-- Select Vehicle --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ $package->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Select Driver</label>
            <select name="driver_id" class="form-control" required>
                <option value="">-- Select Driver --</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ $package->driver_id == $driver->id ? 'selected' : '' }}>
                        {{ $driver->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Update Package</button>
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
