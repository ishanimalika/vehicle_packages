@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<section class="py-5 bg-light">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Gallery</h2>
        <p class="text-muted mb-5">Explore our vehicles and travel memories.</p>
        <div class="row">
            @for($i = 1; $i <= 6; $i++)
                <div class="col-md-4 mb-4">
                    <img src="{{ asset('images/gallery' . $i . '.jpg') }}" class="img-fluid rounded shadow-sm" alt="Gallery Image">
                </div>
            @endfor
        </div>
    </div>
</section>
@endsection
