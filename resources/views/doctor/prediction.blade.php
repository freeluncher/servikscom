@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Make a Prediction</h1>

        <form method="POST" action="{{ route('doctor.predict') }}" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="image">Image</label>
                <input type="file" name="image" class="form-control-file" id="image" required>
            </div>

            <button type="submit" class="btn btn-primary">Predict</button>
        </form>
    </div>
@endsection
