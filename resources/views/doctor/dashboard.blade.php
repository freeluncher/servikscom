@extends('layouts.app')

@section('title', 'Doctor Dashboard')

@section('content')
    <div class="bg-white p-6 rounded-lg shadow-lg">
        <h1 class="text-2xl font-bold mb-4 text-primary">Dashboard</h1>
        <p class="text-secondary">Welcome to your dashboard, {{ Auth::user()->name }}!</p>
        <button class="mt-4 bg-accent1 text-white px-4 py-2 rounded hover:bg-accent2">
            Action Button
        </button>
    </div>
@endsection
