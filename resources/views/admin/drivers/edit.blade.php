@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Driver</h2>

    <form action="{{ route('drivers.update', $driver->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $driver->name }}" required>
        </div>

        <div class="mb-3">
            <label>License Number</label>
            <input type="text" name="license_number" class="form-control" value="{{ $driver->license_number }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $driver->phone }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $driver->email }}">
        </div>

        <button class="btn btn-primary">Update Driver</button>
        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
