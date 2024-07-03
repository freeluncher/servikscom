<!-- resources/views/admin/dashboard.blade.php -->

@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded mb-6">
                {{ session('error') }}
            </div>
        @endif

        <h2 class="text-xl font-semibold mb-4">Pending Doctor Approvals</h2>

        @if ($doctors->isEmpty())
            <p>No pending approvals.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2">Name</th>
                        <th class="py-2">Email</th>
                        <th class="py-2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($doctors as $doctor)
                        <tr>
                            <td class="border px-4 py-2">{{ $doctor->name }}</td>
                            <td class="border px-4 py-2">{{ $doctor->email }}</td>
                            <td class="border px-4 py-2">
                                <form method="POST" action="{{ route('admin.approve_doctor', $doctor->id) }}">
                                    @csrf
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Approve</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
