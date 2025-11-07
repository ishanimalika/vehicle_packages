<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\Package;
use App\Models\Driver;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard()
    {
        // ✅ get admin data from session
        $adminId = session('admin_logged_in'); // this is what your middleware uses

        if (!$adminId) {
            return redirect()->route('admin.login')->with('error', 'Please login first.');
        }

        // ✅ Load admin user
        $admin = Admin::find($adminId);

        // ✅ Prevent null error
        $notifications = $admin?->unreadNotifications ?? collect();
        $count = $notifications->count();

        // ✅ Dashboard counts
        $totalVehicles = Vehicle::count();
        $totalPackages = Package::count();
        $totalDrivers  = Driver::count();

        return view('admin.dashboard', compact(
            'notifications',
            'count',
            'totalVehicles',
            'totalPackages',
            'totalDrivers'
        ));
    }

        public function index()
    {
        $totalVehicles = Vehicle::count();
        $totalPackages = Package::count();
        $totalDrivers = Driver::count();

        return view('admin.dashboard', compact('totalVehicles', 'totalPackages', 'totalDrivers'));
    }
}

