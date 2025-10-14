@extends('layouts.app')

@section('title', $package->title)

@section('content')
<div class="container mt-4">
    <h2>{{ $package->title }}</h2>

    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <p><strong>Description:</strong></p>
            <p>{{ $package->description }}</p>

            <p><strong>Price:</strong> LKR {{ number_format($package->price, 2) }}</p>
            <p><strong>Duration:</strong> {{ $package->duration }}</p>
            <p><strong>Vehicle:</strong> {{ $package->vehicle->name ?? '-' }}</p>
            <p><strong>Driver:</strong> {{ $package->driver->name ?? '-' }}</p>
        </div>
    </div>

    <a href="{{ route('frontend.packages.index') }}" class="btn btn-secondary">Back to Packages</a>
</div>
@endsection
