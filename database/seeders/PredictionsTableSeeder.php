<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prediction;

class PredictionsTableSeeder extends Seeder
{
    public function run()
    {
        Prediction::create([
            'medical_record_id' => 1,
            'image_path' => 'path/to/image.jpg',
            'prediction_result' => 'Negatif'
        ]);
    }
}