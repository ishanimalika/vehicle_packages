@extends('layouts.app')

@section('title', 'Packages')

@section('content')
<div class="container mt-4">
    <h2>Our Packages</h2>
    <div class="row">
        @forelse($packages as $package)
            @include('components.package_card', ['package' => $package])
        @empty
            <p class="text-center text-muted">No packages available at the moment.</p>
        @endforelse
    </div>
</div>
@endsection
