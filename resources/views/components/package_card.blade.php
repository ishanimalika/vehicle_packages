<div class="col-md-4 mb-4">
    <div class="card h-100 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">{{ $package->title }}</h5>
            <p class="card-text">{{ Str::limit($package->description, 80) }}</p>
            <p class="mb-1"><strong>Price:</strong> LKR {{ number_format($package->price, 2) }}</p>
            <p class="mb-1"><strong>Duration:</strong> {{ $package->duration }}</p>
            <p class="mb-1"><strong>Vehicle:</strong> {{ $package->vehicle->name ?? '-' }}</p>
            <p class="mb-1"><strong>Driver:</strong> {{ $package->driver->name ?? '-' }}</p>
            <a href="{{ route('frontend.packages.show', $package->id) }}" class="btn btn-primary mt-2">View Details</a>
        </div>
    </div>
</div>
