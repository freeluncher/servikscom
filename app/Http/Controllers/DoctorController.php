<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('doctor.dashboard');
    }

    public function show($id)
    {
        // Fetch and return patient's details handled by this doctor
    }
}