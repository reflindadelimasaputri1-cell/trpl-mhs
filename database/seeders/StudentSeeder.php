<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;
use Faker\Factory;

class StudentSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Factory::create('id_ID');

        for ($i = 0; $i < 10; $i++) {
            Student::create([
                'nim' => $faker->unique()->numerify('##########'),
                'nama' => $faker->name,
                'prodi' => $faker->randomElement([
                    'TRM',
                    'TRMK',
                    'TL',
                    'TRPL'
                ]),
                'tanggal_lahir' => $faker->date,
                'email' => $faker->unique()->safeEmail,
                'alamat' => $faker->address,
            ]);
        }
    }
}