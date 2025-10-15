<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    // 🟢 Show all vehicles
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('admin.vehicles.index', compact('vehicles'));
    }

    // 🟢 Show create form
    public function create()
    {
        return view('admin.vehicles.create');
    }

    // 🟢 Store new vehicle
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'type'          => 'required|string|max:255',
            'number_plate'  => 'required|string|max:50',
            'seats'         => 'required|integer',
            'price_per_day' => 'nullable|numeric',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageName = null;

        // ✅ Handle image upload manually
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/vehicles'), $imageName);
        }

        Vehicle::create([
            'name'          => $request->name,
            'type'          => $request->type,
            'number_plate'  => $request->number_plate,
            'seats'         => $request->seats,
            'price_per_day' => $request->price_per_day,
            'description'   => $request->description,
            'image'         => $imageName,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle added successfully!');
    }

    // 🟢 Edit form
    public function edit($id)
    {
        $vehicle = Vehicle::findOrFail($id);
        return view('admin.vehicles.edit', compact('vehicle'));
    }

    // 🟢 Update vehicle
    public function update(Request $request, $id)
    {
        $vehicle = Vehicle::findOrFail($id);

        $request->validate([
            'name'          => 'required|string|max:255',
            'type'          => 'required|string|max:255',
            'number_plate'  => 'required|string|max:50',
            'seats'         => 'required|integer',
            'price_per_day' => 'nullable|numeric',
            'description'   => 'nullable|string',
            'image'         => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imageName = $vehicle->image;

        // ✅ Replace image if new one uploaded
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($imageName && file_exists(public_path('uploads/vehicles/' . $imageName))) {
                unlink(public_path('uploads/vehicles/' . $imageName));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('uploads/vehicles'), $imageName);
        }

        $vehicle->update([
            'name'          => $request->name,
            'type'          => $request->type,
            'number_plate'  => $request->number_plate,
            'seats'         => $request->seats,
            'price_per_day' => $request->price_per_day,
            'description'   => $request->description,
            'image'         => $imageName,
        ]);

        return redirect()->route('vehicles.index')->with('success', 'Vehicle updated successfully!');
    }

    // 🟢 Delete vehicle
    public function destroy($id)
    {
        $vehicle = Vehicle::findOrFail($id);

        if ($vehicle->image && file_exists(public_path('uploads/vehicles/' . $vehicle->image))) {
            unlink(public_path('uploads/vehicles/' . $vehicle->image));
        }

        $vehicle->delete();

        return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully!');
    }
}
