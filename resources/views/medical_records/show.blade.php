@extends('layouts.app')

@section('title', 'Medical Record Details')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Medical Record Details</h1>
        <div class="bg-white shadow-md rounded-lg p-4">
            <h2 class="text-xl font-bold">Record Number: {{ $medicalRecord->record_number }}</h2>
            <p><strong>Patient Name:</strong> {{ $medicalRecord->patient->user->name }}</p>
            <p><strong>Doctor Name:</strong> {{ $medicalRecord->doctor->user->name }}</p>
            <p><strong>Examination Date:</strong> {{ $medicalRecord->examination_date }}</p>
            <p><strong>Description:</strong> {{ $medicalRecord->description }}</p>
        </div>
        <a href="{{ route('medical_records.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4">Back to List</a>
    </div>
@endsection
