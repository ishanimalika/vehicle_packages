<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
        {
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);

            $admin = Admin::where('username', $request->username)->first();

            if ($admin && Hash::check($request->password, $admin->password)) {

                // ✅ Store admin ID in session
                session(['admin_logged_in' => $admin->id]);

                return redirect()->route('admin.dashboard');
            }

            return back()->with('error', 'Invalid username or password');
        }

        public function logout()
        {
            session()->forget('admin_logged_in');
            return redirect()->route('admin.login');
        }

}

