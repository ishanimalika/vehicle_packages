@extends('layouts.app')

@section('title', $vehicle->model)

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                @if($vehicle->photo)
                    <img src="{{ asset('storage/' . $vehicle->photo) }}" class="img-fluid rounded shadow">
                @endif
            </div>
            <div class="col-md-6">
                <h2>{{ $vehicle->model }}</h2>
                <p><strong>Type:</strong> {{ $vehicle->type }}</p>
                <p><strong>Seats:</strong> {{ $vehicle->seats }}</p>
                <p class="fw-bold text-success">LKR {{ number_format($vehicle->price_per_day, 2) }}/day</p>
                <a href="{{ route('frontend.booking.create', ['vehicle' => $vehicle->id]) }}" class="btn btn-success">Book Now</a>
            </div>
        </div>
    </div>
</section>
@endsection
