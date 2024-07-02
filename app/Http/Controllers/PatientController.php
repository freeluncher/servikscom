<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
        return view('patient.dashboard');
    }

    public function medicalRecords()
    {
        // Fetch and return patient's medical records
    }
}