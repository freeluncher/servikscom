<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PredictionController extends Controller
{
    public function index()
    {
        return view('doctor.prediction');
    }

    public function predict(Request $request)
    {
        // Handle image upload and prediction using Flask API
    }
}