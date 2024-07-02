<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    public function run()
    {
        Doctor::create([
            'user_id' => 2, // ID dari pengguna Doctor
            'nik' => '0987654321098765',
            'birth_date' => '1980-01-01'
        ]);
    }
}