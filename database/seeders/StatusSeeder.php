<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            [
                'name' => 'Patient under 65 years old',
                'slug' => Str::slug('Patient under 65 years old'),
                'created_at' => '2021-03-18 10:58:31'
            ],
            [
                'name' => 'Refused',
                'slug' => Str::slug('Refused'),
                'created_at' => '2021-03-19 10:58:31'
            ],
            [
                'name' => 'In Progress',
                'slug' => Str::slug('In Progress'),
                'created_at' => '2021-03-20 10:58:31'
            ],
            [
                'name' => 'Complete',
                'slug' => Str::slug('Complete'),
                'created_at' => '2021-03-21 10:58:31'
            ]
            
        ])
            ->each(function ($status) {
                Status::create($status);
            });
    }
}
