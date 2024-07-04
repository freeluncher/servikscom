@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Add Patient</h1>

        <form method="POST" action="{{ route('doctor.patients.tempStore') }}" class="space-y-4">
            @csrf
            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name"
                    class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="name" required>
            </div>
            <div class="form-group">
                <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                <input type="text" name="nik"
                    class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="nik" required>
            </div>
            <div class="form-group">
                <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date</label>
                <input type="date" name="birth_date"
                    class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="birth_date" required>
            </div>
            <div class="form-group">
                <label for="age" class="block text-sm font-medium text-gray-700">Age</label>
                <input type="number" name="age"
                    class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="age" readonly>
            </div>
            <div class="form-group">
                <label for="examination_date" class="block text-sm font-medium text-gray-700">Examination Date</label>
                <input type="date" name="examination_date"
                    class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" id="examination_date"
                    required>
            </div>
            <input type="hidden" name="user_id" id="user_id">
            <button type="submit"
                class="btn btn-primary bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Next</button>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const birthDateInput = document.getElementById('birth_date');
                const ageInput = document.getElementById('age');
                const nikInput = document.getElementById('nik');
                const userIdInput = document.getElementById('user_id');
                const nameInput = document.getElementById('name'); // Add name input

                birthDateInput.addEventListener('change', function() {
                    const birthDate = new Date(this.value);
                    const today = new Date();
                    let age = today.getFullYear() - birthDate.getFullYear();
                    const monthDifference = today.getMonth() - birthDate.getMonth();

                    if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate
                            .getDate())) {
                        age--;
                    }

                    ageInput.value = age;
                });

                nikInput.addEventListener('change', function() {
                    const nik = this.value;
                    const name = nameInput.value; // Get name value
                    fetch(`/doctor/check-nik/${nik}?name=${name}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data.user_id) {
                                userIdInput.value = data.user_id;
                            } else {
                                userIdInput.value = '';
                            }
                        });
                });
            });
        </script>
    </div>
@endsection
