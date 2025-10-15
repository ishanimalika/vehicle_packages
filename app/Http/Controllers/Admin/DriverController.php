<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Driver;

class DriverController extends Controller
{
    /**
     * Display all drivers
     */
    public function index()
    {
        $drivers = Driver::all();
        return view('admin.drivers.index', compact('drivers'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.drivers.create');
    }

    /**
     * Store a new driver
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'license_no'  => 'required|string|max:100',
            'phone'       => 'required|string|max:20',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $photoName = null;

        // ✅ Handle image upload safely
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/drivers'), $photoName);
        }

        Driver::create([
            'name'        => $request->name,
            'license_no'  => $request->license_no,
            'phone'       => $request->phone,
            'photo'       => $photoName,
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver added successfully.');
    }

    /**
     * Edit form
     */
    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return view('admin.drivers.edit', compact('driver'));
    }

    /**
     * Update driver
     */
    public function update(Request $request, $id)
    {
        $driver = Driver::findOrFail($id);

        $request->validate([
            'name'        => 'required|string|max:255',
            'license_no'  => 'required|string|max:100',
            'phone'       => 'required|string|max:20',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $photoName = $driver->photo;

        // ✅ Handle new photo upload
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('uploads/drivers'), $photoName);

            // Delete old photo if exists
            if (!empty($driver->photo) && file_exists(public_path('uploads/drivers/' . $driver->photo))) {
                unlink(public_path('uploads/drivers/' . $driver->photo));
            }
        }

        $driver->update([
            'name'        => $request->name,
            'license_no'  => $request->license_no,
            'phone'       => $request->phone,
            'photo'       => $photoName,
        ]);

        return redirect()->route('drivers.index')->with('success', 'Driver updated successfully.');
    }

    /**
     * Delete driver
     */
    public function destroy($id)
    {
        $driver = Driver::findOrFail($id);

        // ✅ Delete photo from folder if exists
        if (!empty($driver->photo) && file_exists(public_path('uploads/drivers/' . $driver->photo))) {
            unlink(public_path('uploads/drivers/' . $driver->photo));
        }

        $driver->delete();

        return redirect()->route('drivers.index')->with('success', 'Driver deleted successfully.');
    }
}
