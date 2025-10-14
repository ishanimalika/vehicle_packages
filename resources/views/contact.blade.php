@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-4">Contact Us</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('frontend.contact.send') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Message</label>
                        <textarea name="message" rows="4" class="form-control" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-warning w-100 fw-bold">Send Message</button>
                </form>
            </div>

            <div class="col-md-6 mt-4 mt-md-0">
               <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31681.388051260437!2d81.03841760609889!3d6.988833699824662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae462167fa6dad9%3A0x84d3d072c32aa246!2sBadulla!5e0!3m2!1sen!2slk!4v1760429933135!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                <div class="mt-3">
                    <p><strong>Phone:</strong> +94 77 123 4567</p>
                    <p><strong>WhatsApp:</strong> +94 77 123 4567</p>
                    <p><strong>Email:</strong> info@gaganatours.lk</p>
                    <p><strong>Address:</strong> Colombo, Sri Lanka</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
