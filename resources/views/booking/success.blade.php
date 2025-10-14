@extends('layouts.app')

@section('title', 'Booking Successful')

@section('content')
<div class="container text-center my-5">
    <h2 class="text-success">Booking Successful!</h2>
    <p>Thank you for choosing <strong>GAGANA Tours</strong>. Our team will contact you soon to confirm your booking.</p>
    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Back to Home</a>
</div>
@endsection
