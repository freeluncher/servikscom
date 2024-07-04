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

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Diagnose Patient</h1>

        @if (session()->has('patient_data'))
            @php
                $patientData = session('patient_data');
            @endphp

            <form method="POST" action="{{ route('doctor.predict') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Name:</label>
                    <p class="mt-1 text-gray-900">{{ $patientData['name'] }}</p>
                </div>
                <div>
                    <label for="nik" class="block text-sm font-medium text-gray-700">NIK:</label>
                    <p class="mt-1 text-gray-900">{{ $patientData['nik'] }}</p>
                </div>
                <div>
                    <label for="birth_date" class="block text-sm font-medium text-gray-700">Birth Date:</label>
                    <p class="mt-1 text-gray-900">{{ $patientData['birth_date'] }}</p>
                </div>
                <div>
                    <label for="age" class="block text-sm font-medium text-gray-700">Age:</label>
                    <p class="mt-1 text-gray-900">{{ $patientData['age'] }}</p>
                </div>
                <div>
                    <label for="examination_date" class="block text-sm font-medium text-gray-700">Examination Date:</label>
                    <p class="mt-1 text-gray-900">{{ $patientData['examination_date'] }}</p>
                </div>

                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image"
                        class="mt-1 block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none"
                        id="image" required>
                    <div class="mt-3">
                        <img id="imagePreview"
                            src="{{ session('image_path') ? asset('storage/' . session('image_path')) : '#' }}"
                            alt="Image Preview" class="{{ session('image_path') ? 'w-32 h-32 object-cover' : 'hidden' }}">
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Predict
                </button>
            </form>
        @else
            <p>No patient data available.</p>
        @endif

        @if (session()->has('prediction_result'))
            @php
                $predictionResult = session('prediction_result');
            @endphp
            <div class="mt-6">
                <h2 class="text-xl font-semibold mb-4">Prediction Result</h2>
                <p>Prediction: {{ $predictionResult['prediction'] }}</p>
                <p>Confidence: {{ $predictionResult['confidence'] }}%</p>
            </div>

            <form method="POST" action="{{ route('doctor.medical-records.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $patientData['user_id'] }}">
                <input type="hidden" name="image_path" value="{{ session('image_path') }}">
                <input type="hidden" name="prediction_result" value="{{ $predictionResult['prediction'] }}">

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700">Diagnosis</label>
                    <textarea name="description" id="description" rows="4"
                        class="form-control mt-1 block w-full border-gray-300 rounded-md shadow-sm" required></textarea>
                </div>

                <button type="submit"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                    Save Diagnosis
                </button>
            </form>
        @endif

        <script>
            document.getElementById('image').addEventListener('change', function(event) {
                const [file] = this.files;
                if (file) {
                    const preview = document.getElementById('imagePreview');
                    preview.src = URL.createObjectURL(file);
                    preview.classList.remove('hidden');
                    preview.classList.add('w-32', 'h-32', 'object-cover');
                }
            });
        </script>
    </div>
@endsection
