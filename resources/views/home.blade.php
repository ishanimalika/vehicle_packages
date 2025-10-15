@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="hero position-relative text-white text-center">
    <div class="d-flex flex-column justify-content-center align-items-center h-100 bg-dark bg-opacity-50">
        <h1 class="display-4 fw-bold">Welcome to GAGANA Tours</h1>
        <p class="lead mb-4">Explore Sri Lanka with comfort and safety. Hire your KDH today!</p>
        <a href="{{ route('frontend.packages.index') }}" class="btn btn-warning btn-lg text-dark fw-bold">View Packages</a>
    </div>
</section>

<!-- About Us Section -->
<section class="py-5 text-center bg-light">
    <div class="container">
        <h2 class="fw-bold mb-3">About GAGANA Tours</h2>
        <p class="text-muted mx-auto" style="max-width: 800px;">
            We provide premium KDH and van hire services for tourists across Sri Lanka.
            Whether you’re planning a family trip, a corporate tour, or airport transfers, our professional drivers and well-maintained vehicles ensure a safe and enjoyable journey.
        </p>
    </div>
</section>

<!-- Featured Packages -->
<section class="package py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Featured Tour Packages</h2>
        <div class="row">
            @foreach($featuredPackages as $package)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $package->title }}</h5>
                            <p class="card-text">{{ Str::limit($package->description, 100) }}</p>
                            <p class="fw-bold text-success">LKR {{ number_format($package->price, 2) }}</p>
                            <a href="{{ route('frontend.packages.show', $package->id) }}" class="btn btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('frontend.packages.index') }}" class="btn btn-primary">View All Packages</a>
        </div>
    </div>
</section>

<!-- Featured Vehicles -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Vehicles</h2>
        <div class="row">
            @foreach($featuredVehicles as $vehicle)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($vehicle->image)
                            <img src="{{ asset('uploads/vehicles/' . $vehicle->image) }}" class="card-img-top" alt="{{ $vehicle->model }}">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $vehicle->name }}</h5>
                            <p class="text-muted">Type: {{ $vehicle->type }}</p>
                            <p class="fw-bold text-success">LKR {{ number_format($vehicle->price_per_day, 2) }}/day</p>
                            <a href="{{ route('booking.create', ['vehicle' => $vehicle->id]) }}" class="btn btn-success">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 text-center ">
    <div class="container">
        <h2 class="fw-bold">Ready to Start Your Journey?</h2>
        <p class="mb-4">Book your vehicle today and enjoy a comfortable tour around Sri Lanka.</p>
        <a href="{{ route('booking.create') }}" class="btn btn-dark btn-lg">Hire a KDH Now</a>
    </div>
</section>
@endsection
