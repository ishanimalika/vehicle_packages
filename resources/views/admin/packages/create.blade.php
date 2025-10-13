@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h2>Add New Package</h2>

    <form action="{{ route('packages.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Package Name</label>
            <input type="text" name="package_name" class="form-control" required>
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
            <label>Duration</label>
            <input type="text" name="duration" class="form-control" placeholder="e.g. 3 Days" required>
        </div>

        <button class="btn btn-success">Save Package</button>
        <a href="{{ route('packages.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
