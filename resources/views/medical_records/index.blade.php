@extends('layouts.app')

@section('title', 'Medical Records')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Medical Records</h1>
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr>
                    <th class="px-4 py-2">Record Number</th>
                    <th class="px-4 py-2">Patient Name</th>
                    <th class="px-4 py-2">Examination Date</th>
                    <th class="px-4 py-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($medicalRecords as $record)
                    <tr>
                        <td class="border px-4 py-2">{{ $record->record_number }}</td>
                        <td class="border px-4 py-2">{{ $record->patient->user->name }}</td>
                        <td class="border px-4 py-2">{{ $record->examination_date }}</td>
                        <td class="border px-4 py-2">
                            <a href="{{ route('medical_records.show', $record->id) }}"
                                class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
                            @if (Auth::user()->role === 'doctor' && $record->doctor_id === Auth::user()->doctor->id)
                                <a href="{{ route('medical_records.edit', $record->id) }}"
                                    class="bg-yellow-500 text-white px-4 py-2 rounded">Edit</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
