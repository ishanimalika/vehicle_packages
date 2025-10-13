@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Edit Driver</h2>

    <form action="{{ route('drivers.update', $driver->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" value="{{ $driver->name }}" required>
        </div>

        <div class="mb-3">
            <label>License Number</label>
            <input type="text" name="license_no" class="form-control" value="{{ $driver->license_no }}" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" value="{{ $driver->phone }}" required>
        </div>

        <div class="mb-3">
            <label>Driver Photo</label><br>
            @if($driver->photo)
                <img src="{{ asset('storage/' . $driver->photo) }}" width="100" class="mb-2 rounded">
            @else
                <p>No photo uploaded</p>
            @endif
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-primary">Update Driver</button>
        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
