@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Medical Record</h2>
        <form method="POST" action="{{ route('doctor.medical-records.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Predict</button>
        </form>
    </div>
@endsection
