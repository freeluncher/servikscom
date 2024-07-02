<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MedicalRecord;
use App\Models\Patient;
use App\Models\Doctor;

class MedicalRecordController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'patient') {
            $medicalRecords = MedicalRecord::where('patient_id', $user->patient->id)->get();
        } elseif ($user->role === 'doctor') {
            $medicalRecords = MedicalRecord::where('doctor_id', $user->doctor->id)->get();
        } else {
            $medicalRecords = MedicalRecord::all();
        }

        return view('medical_records.index', compact('medicalRecords'));
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
        $user = auth()->user();
        $medicalRecord = MedicalRecord::findOrFail($id);

        if ($user->role === 'patient' && $medicalRecord->patient_id !== $user->patient->id) {
            abort(403);
        }

        if ($user->role === 'doctor' && $medicalRecord->doctor_id !== $user->doctor->id) {
            abort(403);
        }

        return view('medical_records.show', compact('medicalRecord'));
    }

    public function edit($id)
    {
        $user = auth()->user();
        $medicalRecord = MedicalRecord::findOrFail($id);

        if ($user->role === 'doctor' && $medicalRecord->doctor_id !== $user->doctor->id) {
            abort(403);
        }

        return view('medical_records.edit', compact('medicalRecord'));
    }

    public function update(Request $request, $id)
    {
        $medicalRecord = MedicalRecord::findOrFail($id);

        // Check if the user has permission to update the record
        if (auth()->user()->role !== 'doctor' || $medicalRecord->doctor_id !== auth()->user()->doctor->id) {
            abort(403);
        }

        $request->validate([
            'description' => 'required|string',
        ]);

        $medicalRecord->description = $request->description;
        $medicalRecord->save();

        return redirect()->route('medical_records.index')->with('success', 'Medical record updated successfully.');
    }

    public function destroy($id)
    {
        // Delete specific medical record
    }
}