@extends('layouts.app')

@section('title', 'Edit Medical Record')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-2xl font-bold mb-4">Edit Medical Record</h1>
        <form action="{{ route('medical_records.update', $medicalRecord->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="description" class="block text-gray-700">Description</label>
                <textarea id="description" name="description" class="w-full px-4 py-2 border rounded-lg">{{ $medicalRecord->description }}</textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
        </form>
        <a href="{{ route('medical_records.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded mt-4">Back to
            List</a>
    </div>
@endsection
