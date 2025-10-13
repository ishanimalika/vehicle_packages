<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Package;
use App\Models\Driver;

class AdminController extends Controller
{
    public function index()
    {
        // Get total counts
        $totalVehicles = Vehicle::count();
        $totalPackages = Package::count();
        $totalDrivers = Driver::count();

        return view('admin.dashboard', compact('totalVehicles', 'totalPackages', 'totalDrivers'));
    }
}

