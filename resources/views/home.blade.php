@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div class="container mt-4">
    <h1>Welcome to GAGANA Tours</h1>
    <p>Explore our tour packages and hire vehicles with professional drivers.</p>

    <a href="{{ route('frontend.packages.index') }}" class="btn btn-primary">View Packages</a>
</div>
@endsection
