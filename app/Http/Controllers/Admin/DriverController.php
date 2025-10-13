<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    // Display all drivers
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.drivers.index', compact('drivers'));
    }

    // Show form to create a driver
    public function create()
    {
        return view('admin.drivers.create');
    }

    // Store a new driver
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'license_no' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $data['photo'] = $request->file('photo')->store('drivers', 'public');
        }

        Driver::create($data);

        return redirect()->route('drivers.index')->with('success', 'Driver added successfully');
    }

    // Show edit form
    public function edit(Driver $driver)
    {
        return view('admin.drivers.edit', compact('driver'));
    }

    // Update driver
    public function update(Request $request, Driver $driver)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'license_no' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'photo' => 'nullable|image|max:2048',
        ]);

        $data = $request->except('photo');

        if ($request->hasFile('photo') && $request->file('photo')->isValid()) {
            $data['photo'] = $request->file('photo')->store('drivers', 'public');
        }

        $driver->update($data);

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully');
    }

    // Delete driver
    public function destroy(Driver $driver)
    {
        $driver->delete();
        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully');
    }
}
