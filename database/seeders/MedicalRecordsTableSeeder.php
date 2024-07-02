<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MedicalRecord;

class MedicalRecordsTableSeeder extends Seeder
{
    public function run()
    {
        MedicalRecord::create([
            'doctor_id' => 1,
            'patient_id' => 1,
            'record_number' => 'MR123456',
            'description' => 'Contoh deskripsi rekam medis',
            'examination_date' => '2023-07-01'
        ]);
    }
}