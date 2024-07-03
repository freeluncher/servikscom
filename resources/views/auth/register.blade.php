<!-- resources/views/auth/register.blade.php -->

@extends('layouts.app')
@section('title', 'Register')
@section('content')
    <div class="container">
        <h1>Register</h1>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}"
                    required>
                @error('email')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
                @error('password')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password-confirm" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password-confirm" name="password_confirmation" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" id="role" name="role" required>
                    <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                    <option value="patient" {{ old('role') == 'patient' ? 'selected' : '' }}>Patient</option>
                </select>
                @error('role')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3" id="nik-field" style="display: none;">
                <label for="nik" class="form-label">NIK (for Patients)</label>
                <input type="text" class="form-control" id="nik" name="nik" value="{{ old('nik') }}">
                @error('nik')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Register</button>
        </form>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const roleSelect = document.getElementById('role');
            const nikField = document.getElementById('nik-field');

            roleSelect.addEventListener('change', function() {
                if (roleSelect.value === 'patient') {
                    nikField.style.display = 'block';
                } else {
                    nikField.style.display = 'none';
                }
            });

            // Initial check
            if (roleSelect.value === 'patient') {
                nikField.style.display = 'block';
            } else {
                nikField.style.display = 'none';
            }
        });
    </script>
@endsection
