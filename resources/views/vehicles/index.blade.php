@extends('layouts.app')

@section('title', 'Our Vehicles')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Our Vehicle Fleet</h2>
        <div class="row">
            @foreach($vehicles as $vehicle)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        @if($vehicle->photo)
                            <img src="{{ asset('storage/' . $vehicle->photo) }}" class="card-img-top" alt="{{ $vehicle->model }}">
                        @endif
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $vehicle->model }}</h5>
                            <p class="text-muted">{{ $vehicle->type }}</p>
                            <p>Seats: {{ $vehicle->seats }}</p>
                            <p class="fw-bold text-success">LKR {{ number_format($vehicle->price_per_day, 2) }}/day</p>
                            <a href="{{ route('vehicles.show', $vehicle->id) }}" class="btn btn-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
