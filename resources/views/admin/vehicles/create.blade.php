@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h3>Add New Vehicle</h3>

    <form action="{{ route('vehicles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Number Plate</label>
            <input type="text" name="number_plate" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Seats</label>
            <input type="number" name="seats" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Image</label>
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-success">Save Vehicle</button>
    </form>
</div>
@endsection
