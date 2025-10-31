
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="{{ url('/') }}">GAGANA Tours</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link">About</a></li>
                <li class="nav-item"><a href="{{ route('frontend.vehicles.index') }}" class="nav-link">Vehicles</a></li>
                <li class="nav-item"><a href="{{ route('gallery') }}" class="nav-link">Gallery</a></li>
                <li class="nav-item"><a href="{{ route('contact') }}" class="nav-link">Contact</a></li>
            </ul>
        </div>
	    </div>
	  </nav>
