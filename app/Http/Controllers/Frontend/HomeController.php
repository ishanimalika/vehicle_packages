<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\Vehicle;

class HomeController extends Controller
{
    public function index()
    {
        $featuredPackages = Package::latest()->take(3)->get();
        $featuredVehicles = Vehicle::latest()->take(3)->get();

        return view('home', compact('featuredPackages', 'featuredVehicles'));
    }
}
