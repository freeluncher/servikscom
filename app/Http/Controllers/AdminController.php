<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $doctors = User::where('role', 'doctor')->where('is_approved', false)->get();
        return view('admin.dashboard', compact('doctors'));
    }
    public function approveDoctor(User $user)
    {
        if ($user->role !== 'doctor') {
            return redirect()->route('admin.dashboard')->with('error', 'Invalid user.');
        }

        $user->is_approved = true;
        $user->save();

        return redirect()->route('admin.dashboard')->with('success', 'Doctor approved successfully.');
    }
    public function show($id)
    {
        // Fetch and return user details
    }

    public function destroy($id)
    {
        // Delete user
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request)
    {
        // Validate and update settings
    }
}