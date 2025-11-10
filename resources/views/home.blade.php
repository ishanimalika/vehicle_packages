@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
    
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('images/bg_2.jpg');" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Fast &amp; Easy Way To Rent A Car With GAGANA Tours</h1>
	            <p style="font-size: 18px;">A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts</p>
            </div>
          </div>
        </div>
      </div>
    </div>

	<section class="ftco-section ftco-no-pt bg-light">
    	<div class="container">
    		<div class="row no-gutters">
    			<div class="col-md-12	featured-top">
    				<div class="row no-gutters">
	  					<div class="col-md-4 d-flex align-items-center">
	  				<form action="{{ route('booking.store') }}" class="request-form ftco-animate bg-primary">
		          		<h2>Make your trip</h2>
						 		<div class="form-group">
			    					<label for="name" class="label">Name *</label>
			    					<input type="text" name="name" class="form-control" required>
			    				</div>
								<div class="form-group">
			    					<label for="email" class="label">Email</label>
			    					<input type="email" name="email" class="form-control" >
			    				</div>
								<div class="form-group">
			    					<label for="phone" class="label">Phone</label>
			    					<input type="text" name="phone" class="form-control" required>
			    				</div>
			    				<div class="form-group">
			    					<label for="pickup_location" class="label">Pick-up Location *</label>
			    					<input type="text" name="pickup_location" class="form-control" required>
			    				</div>
			    				<div class="form-group">
			    					<label for="dropoff_location" class="label">Drop-off location</label>
			    					<input type="text" name="dropoff_location" class="form-control" >
			    				</div>
			    				<div class="d-flex">
			    					<div class="form-group mr-2">
										<label for="pickup_date" class="label">Pick-up date *</label>
										<input type="text" name="pickup_date" class="form-control" id="book_pick_date" required>
									</div>
		                        </div>
								<div class="form-group">
									<label for="pickup_time" class="label">Pick-up time</label>
									<input type="text" name="pickup_time" class="form-control" id="time_pick"  required>
								</div>
								<div class="form-group">
									<label for="vehicle" class="label">Select Vehicle</label>
									<select name="vehicle_id" class="form-control">
										<option value="">-- Select Vehicle --</option>
										@foreach($vehicles as $vehicle)
											<option value="{{ $vehicle->id }}" 
												{{ $selectedVehicle == $vehicle->id ? 'selected' : '' }}>
												{{ $vehicle->name }}
											</option>
										@endforeach
									</select>
			    				</div>
								<div class="form-group">
									<label for="package" class="label">Select Package</label>
									<select name="package_id" class="form-control">
										<option value="">-- Select Package --</option>
										@foreach($packages as $package)
											<option value="{{ $package->id }}"
												{{ $selectedPackage == $package->id ? 'selected' : '' }}>
												{{ $package->title }}
											</option>
										@endforeach
									</select>
			    				</div>
								<div class="form-group">
									<label for="notes" class="label">Additional Notes</label>
									<textarea name="notes" class="form-control" rows="3"></textarea>
			    				</div>
								<div class="form-group">
									<input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
								</div>
							</form>
	  					</div>
	  					<div class="col-md-8 d-flex align-items-center">
	  						<div class="services-wrap rounded-right w-100">
	  							<h3 class="heading-section mb-4">Better Way to Rent Your Perfect Cars</h3>
	  							<div class="row d-flex mb-4">
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Choose Your Pickup Location</h3>
				                </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Select the Best Deal</h3>
					              </div>
					            </div>      
					          </div>
					          <div class="col-md-4 d-flex align-self-stretch ftco-animate">
					            <div class="services w-100 text-center">
				              	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
				              	<div class="text w-100">
					                <h3 class="heading mb-2">Reserve Your Package</h3>
					              </div>
					            </div>      
					          </div>
					        </div>
					        <p><a href="{{ route('booking.create') }}" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p>
	  						</div>
	  					</div>
	  				</div>
				</div>
  		</div>
    </section>

    <!-- Featured Vehicles -->
    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Our Vehicles</h2>

            <div class="row justify-content-center">
                @forelse($featuredVehicles as $vehicle)
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4 mb-4 d-flex align-items-stretch">
                        <div class="card shadow-sm h-100 text-center">
                            @if($vehicle->image)
                                <img src="{{ asset('uploads/vehicles/' . $vehicle->image) }}" 
                                    class="card-img-top" 
                                    alt="{{ $vehicle->model }}" 
                                    style="object-fit: cover; height: 220px;">
                            @endif
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">{{ $vehicle->name }}</h5>
                                <p class="text-muted mb-2">Type: {{ $vehicle->type }}</p>
                                <p class="fw-bold text-success mb-3">
                                    LKR {{ number_format($vehicle->price_per_day, 2) }}/day
                                </p>
                                <a href="{{ route('booking.create', ['vehicle' => $vehicle->id]) }}" 
                                class="btn btn-success mt-auto">
                                    Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">No vehicles available at the moment.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/about.jpg);">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">About us</span>
	            <h2 class="mb-4">Welcome to GAGANA Tours</h2>

	            <p>GAGANA Tours began its journey with a passion for helping travelers explore Sri Lanka comfortably and safely. From humble beginnings, we’ve grown into a trusted name in premium KDH and van rental services. </p>
	            <p><a href="#" class="btn btn-primary py-3 px-4">Search Vehicle</a></p>
	          </div>
					</div>
				</div>
			</div>
	</section>

	<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
          	<span class="subheading">Services</span>
            <h2 class="mb-3">Our Latest Services</h2>
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Wedding Ceremony</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">City Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Airport Transfer</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Whole City Tour</h3>
                <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
              </div>
            </div>
					</div>
				</div>
			</div>
	</section>


<!-- Featured Packages -->
<section class="package py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Featured Tour Packages</h2>
        <div class="row">
            @foreach($featuredPackages as $package)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm h-100">
                        <div class="card-body">
                            <h5 class="card-title">{{ $package->title }}</h5>
                            <p class="card-text">{{ Str::limit($package->description, 100) }}</p>
                            <p class="fw-bold text-success">LKR {{ number_format($package->price, 2) }}</p>
                            <a href="{{ route('frontend.packages.show', $package->id) }}" class="btn btn-outline-primary">View Details</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('frontend.packages.index') }}" class="btn btn-primary">View All Packages</a>
        </div>
    </div>
</section>

<!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


@endsection


@push('scripts')
  <script src="{{ asset('js/jquery.min.js') }}"></script>
  <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
  <script src="{{ asset('js/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
  <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
  <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
  <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('js/aos.js') }}"></script>
  <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
  <script src="{{ asset('js/jquery.timepicker.min.js') }}"></script>
  <script src="{{ asset('js/scrollax.min.js') }}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{ asset('js/google-map.js') }}"></script>
  <script src="{{ asset('js/main.js') }}"></script>
@endpush



