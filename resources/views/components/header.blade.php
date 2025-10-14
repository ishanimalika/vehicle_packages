<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">GAGANA Tours</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('vehicles.index') }}" class="nav-link">Vehicles</a></li>
                <li class="nav-item"><a href="{{ route('gallery') }}" class="nav-link">Gallery</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </div>
</nav>
