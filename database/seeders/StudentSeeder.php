<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Student::create([
            'nim' => '2401093006',
            'nama_lengkap' => 'Haifa Hafitiryanti',
            'tempat_lahir' => 'Padang',
            'tgl_lahir' => '2005-08-04',
            'email' => 'haifa@gmail.com',
            'prodi' => 'MI',
            'alamat' => 'Padang'
        ]);
    }
}
