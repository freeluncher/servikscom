<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MedicalRecordController extends Controller
{
    public function index()
    {
        // Fetch and return medical records handled by this doctor
    }

    public function create()
    {
        return view('doctor.medical-records.create');
    }

    public function store(Request $request)
    {
        // Validate and save medical record
    }

    public function show($id)
    {
        // Fetch and return specific medical record
    }

    public function edit($id)
    {
        // Fetch and return specific medical record for editing
    }

    public function update(Request $request, $id)
    {
        // Validate and update medical record
    }

    public function destroy($id)
    {
        // Delete specific medical record
    }
}