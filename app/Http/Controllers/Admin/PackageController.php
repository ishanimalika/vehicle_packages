<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\Vehicle;
use App\Models\Driver;

class PackageController extends Controller
{
    // Display all packages
    public function index()
    {
        $packages = Package::with('vehicle')->get(); // eager load vehicle
        return view('admin.packages.index', compact('packages'));
    }

    // Show form to create a package
    public function create()
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        return view('admin.packages.create', compact('vehicles', 'drivers'));
    }

    // Store a new package
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string', 
            'price' => 'required|numeric',
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'nullable|exists:drivers,id',
        ]);

        Package::create($request->all());

        return redirect()->route('packages.index')->with('success', 'Package added successfully');
    }

    // Show edit form
    public function edit(Package $package)
    {
        $vehicles = Vehicle::all();
        $drivers = Driver::all();
        return view('admin.packages.edit', compact('package', 'vehicles', 'drivers'));
    }

    // Update package
    public function update(Request $request, Package $package)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'vehicle_id' => 'required|exists:vehicles,id',
            'driver_id' => 'nullable|exists:drivers,id',
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')->with('success', 'Package updated successfully');
    }

    // Delete package
    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted successfully');
    }
}
