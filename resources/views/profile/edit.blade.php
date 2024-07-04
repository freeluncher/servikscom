@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 py-8">
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-6">Edit Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-6">
            @csrf
            {{-- {{ method_field('PUT') }} --}}

            <div class="form-group">
                <label for="birth_date" class="block text-gray-700 font-bold mb-2">Birth Date</label>
                <input type="date" name="birth_date"
                    class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    id="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
            </div>

            <div class="form-group">
                <label for="phone" class="block text-gray-700 font-bold mb-2">Phone</label>
                <input type="text" name="phone"
                    class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    id="phone" value="{{ old('phone', $user->phone) }}">
            </div>

            <div class="form-group">
                <label for="address" class="block text-gray-700 font-bold mb-2">Address</label>
                <input type="text" name="address"
                    class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    id="address" value="{{ old('address', $user->address) }}">
            </div>

            <div class="form-group">
                <label for="nik" class="block text-gray-700 font-bold mb-2">NIK</label>
                <input type="text" name="nik"
                    class="form-control block w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    id="nik" value="{{ old('nik', $user->nik) }}">
            </div>

            <button type="submit"
                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Update Profile
            </button>
        </form>
    </div>
@endsection
