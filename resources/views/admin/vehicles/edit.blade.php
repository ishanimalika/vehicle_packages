@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h3>Edit Vehicle</h3>

    <form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" value="{{ $vehicle->name }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Type</label>
            <input type="text" name="type" value="{{ $vehicle->type }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Number Plate</label>
            <input type="text" name="number_plate" value="{{ $vehicle->number_plate }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Seats</label>
            <input type="number" name="seats" value="{{ $vehicle->seats }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>Image</label><br>
            @if($vehicle->image)
                <img src="{{ asset('uploads/vehicles/'.$vehicle->image) }}" alt="{{ $vehicle->name }}" width="80"><br><br>
            @endif
            <input type="file" name="image" class="form-control">
        </div>

        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
