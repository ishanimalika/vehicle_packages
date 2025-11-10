<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Vehicle;

class HomeController extends Controller
{
    public function index()
    {
        // Featured items (optional, for homepage display)
        $featuredPackages = Package::latest()->take(3)->get();
        $featuredVehicles = Vehicle::latest()->take(3)->get();

        // For booking form dropdown
        $vehicles = Vehicle::all();
        $packages = Package::all();
        $selectedVehicle = null; // default: no pre-selection
        $selectedPackage = null; // default: no pre-selection

        return view('home', compact(
            'featuredPackages',
            'featuredVehicles',
            'vehicles',
            'packages',
            'selectedVehicle',
            'selectedPackage'
        ));
    }
}
