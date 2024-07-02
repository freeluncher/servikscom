<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Patient;

class PatientsTableSeeder extends Seeder
{
    public function run()
    {
        Patient::create([
            'user_id' => 3, // ID dari pengguna Patient
            'nik' => '1234567890123456',
            'birth_date' => '1990-01-01',
            'phone' => '081234567890',
            'address' => 'Jl. Contoh Alamat No.1'
        ]);
    }
}