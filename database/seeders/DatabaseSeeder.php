<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        Student::create([
            'nim' => '1234567890',
            'nama' => 'Reflinda Delima',
            'prodi' => 'TRPL',
            'tanggal_lahir' => '2005-12-10',
            'email' => 'reflinda@gmail.com',
            'alamat' => 'Purwakarta',
        ]);

        Student::create([
            'nim' => '1234567891',
            'nama' => 'Andi Saputra',
            'prodi' => 'TRPL',
            'tanggal_lahir' => '2005-05-15',
            'email' => 'andi@gmail.com',
            'alamat' => 'Purwakarta',
        ]);

        Student::create([
            'nim' => '1234567892',
            'nama' => 'Siti Aisyah',
            'prodi' => 'TRPL',
            'tanggal_lahir' => '2005-08-20',
            'email' => 'siti@gmail.com',
            'alamat' => 'Subang',
        ]);
    }
}