@extends('layouts.app')

@section('title', 'Book a Vehicle')

@section('content')
<div class="container my-5">
    <h2 class="mb-4 text-center">Book Your Vehicle</h2>

    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <form action="{{ route('booking.store') }}" method="POST" class="mx-auto" style="max-width: 700px;">
        @csrf

        <div class="mb-3">
            <label>Name *</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Phone *</label>
            <input type="text" name="phone" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Pickup Location *</label>
            <input type="text" name="pickup_location" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Drop-off Location</label>
            <input type="text" name="dropoff_location" class="form-control">
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Pickup Date *</label>
                <input type="date" name="pickup_date" class="form-control" required>
            </div>

            <div class="col-md-6 mb-3">
                <label>Pickup Time *</label>
                <input type="time" name="pickup_time" class="form-control" required>
            </div>
        </div>

        <div class="mb-3">
            <label>Select Vehicle</label>
            <select name="vehicle_id" class="form-control">
                <option value="">-- Select Vehicle --</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" 
                        {{ $selectedVehicle == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Select Package</label>
            <select name="package_id" class="form-control">
                <option value="">-- Select Package --</option>
                @foreach($packages as $package)
                    <option value="{{ $package->id }}"
                        {{ $selectedPackage == $package->id ? 'selected' : '' }}>
                        {{ $package->title }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label>Additional Notes</label>
            <textarea name="notes" class="form-control" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-success w-100">Submit Booking</button>
    </form>
</div>
@endsection
