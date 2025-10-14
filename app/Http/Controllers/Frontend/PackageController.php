<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Package;

class PackageController extends Controller
{
    /**
     * Display a listing of all packages.
     */
    public function index()
    {
        // Eager load vehicle and driver for performance
        $packages = Package::with(['vehicle', 'driver'])->get();

        return view('packages.index', compact('packages'));
    }

    /**
     * Display the details of a single package.
     */
    public function show(Package $package)
    {
        // Load related vehicle and driver
        $package->load(['vehicle', 'driver']);

        return view('packages.show', compact('package'));
    }
}
