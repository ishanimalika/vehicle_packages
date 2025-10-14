<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Package;
use App\Models\Booking;

class BookingController extends Controller
{
    // Show booking form
    public function create(Request $request)
    {
        $vehicles = Vehicle::all();
        $packages = Package::all();

        $selectedVehicle = $request->get('vehicle_id');
        $selectedPackage = $request->get('package_id');

        return view('booking.create', compact('vehicles', 'packages', 'selectedVehicle', 'selectedPackage'));
    }

    // Store booking
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|email',
            'phone' => 'required|string|max:20',
            'pickup_location' => 'required|string|max:255',
            'dropoff_location' => 'nullable|string|max:255',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',
            'vehicle_id' => 'nullable|exists:vehicles,id',
            'package_id' => 'nullable|exists:packages,id',
            'notes' => 'nullable|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('booking.success')->with('success', 'Your booking has been submitted successfully!');
    }

    // Success page
    public function success()
    {
        return view('booking.success');
    }
}
