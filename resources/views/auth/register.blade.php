<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <section id="register-page" class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto">
            <div
                class="absolute inset-0 bg-gradient-to-r from-secondary to-accent1 shadow-lg transform -skew-y-6 sm:skew-y-0 sm:-rotate-6 sm:rounded-3xl">
            </div>
            <div class="relative px-2 py-10 bg-primary shadow-lg sm:rounded-3xl sm:p-10">
                @if (session('message'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4"
                        role="alert">
                        <strong class="font-bold">Warning!</strong>
                        <span class="block sm:inline">{{ session('message') }}</span>
                    </div>
                @endif
                <div class="flex items-center align-middle mb-3">
                    <img class="h-10 w-10" src="{{ asset('iconApp.svg') }}" alt="Siserviks Logo">
                    <span class="font-medium text-secondary ps-2">Si Serviks</span>
                </div>
                <div>
                    <h1 class="text-4xl text-accent1 font-bold">Nice to meet you!</h1>
                    <p class="text-md text-secondary">Create a new account</p>
                </div>
                <div class="divide-y divide-gray-200 mt-5">
                    <form method="POST" action="{{ route('register') }}"
                        class="py-2 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                        @csrf

                        <div class="relative">
                            <input type="text" placeholder="Username"
                                class="bg-primary @error('name') is-invalid @enderror peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                id="name" name="name" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <label for="name"
                                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Username</label>
                        </div>

                        <div class="relative">
                            <input type="email"
                                class="bg-primary @error('email') is-invalid @enderror peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                id="email" name="email" value="{{ old('email') }}" placeholder="Email address"
                                required>
                            @error('email')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <label for="email"
                                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Email
                                Addres</label>
                        </div>

                        <div class="relative">
                            <input type="password"
                                class="bg-primary @error('password') is-invalid @enderror peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                id="password" name="password" placeholder="Password" required>
                            @error('password')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <label for="password"
                                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Password</label>
                        </div>

                        <div class="relative">
                            <input type="password"
                                class="bg-primary @error('password-confirm') is-invalid @enderror peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                id="password-confirm" name="password_confirmation" placeholder="Confirm Password"
                                required>
                            @error('password-confirm')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <label for="password-confirm"
                                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Confirm
                                Password</label>
                        </div>

                        <div class="relative">
                            <select
                                class="bg-primary pt-2 @error('role') is-invalid @enderror peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                id="role" name="role" placeholder="role" required>
                                <option value="doctor" {{ old('role') == 'doctor' ? 'selected' : '' }}>Doctor</option>
                                <option value="patient" {{ old('role') == 'patient' ? 'selected' : '' }}>Patient
                                </option>
                            </select>
                            <label for="role"
                                class="absolute pt-2 left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">Role</label>
                            @error('role')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="relative" id="nik-field" style="display: none;">
                            <input type="text"
                                class="bg-primary @error('nik') is-invalid @enderror peer placeholder-transparent h-10 w-full border-b-2 border-gray-700 text-gray-900 focus:outline-none focus:borer-rose-600"
                                id="nik" name="nik" value="{{ old('nik') }}"
                                placeholder="NIK(for Patients)">
                            <label for="nik"
                                class="absolute left-0 -top-3.5 text-gray-600 text-sm peer-placeholder-shown:text-base peer-placeholder-shown:text-gray-440 peer-placeholder-shown:top-2 transition-all peer-focus:-top-3.5 peer-focus:text-gray-600 peer-focus:text-sm">NIK
                                (for Patients)</label>
                            @error('nik')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="relative flex justify-center">
                            <button type="submit"
                                class="bg-secondary text-white font-semibold rounded-md px-20 py-1 mt-5 hover:bg-accent1 hover:text-accent2">Register</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>


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
</body>

</html>
