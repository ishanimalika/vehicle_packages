@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Driver</h2>

    <form action="{{ route('drivers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>License Number</label>
            <input type="text" name="license_no" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Phone</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Driver Photo</label>
            <input type="file" name="photo" class="form-control" accept="image/*">
        </div>

        <button class="btn btn-success">Save Driver</button>
        <a href="{{ route('drivers.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
