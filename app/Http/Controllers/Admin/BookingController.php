<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::latest()->get();
        return view('admin.booking.index', compact('bookings'));
    }

    public function show($id)
    {
        $booking = Booking::findOrFail($id);
        return view('admin.booking.show', compact('booking'));
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();
        return redirect()->route('admin.booking.index')->with('success', 'Booking deleted successfully.');
    }

    // ✅ Update booking status
    public function updateStatus(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->status;
        $booking->save();

        return redirect()->route('admin.booking.index')->with('success', 'Booking status updated.');
    }
}
