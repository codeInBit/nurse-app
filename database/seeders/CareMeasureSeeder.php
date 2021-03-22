<?php

namespace Database\Seeders;

use App\Models\CareMeasure;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CareMeasureSeeder extends Seeder
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
                'name' => 'Influenza Vaccine',
                'slug' => Str::slug('Influenza Vaccine'),
                'frequency' => 'once (lifetime)',
            ],
            [
                'name' => 'DM Eye Exam',
                'slug' => Str::slug('DM Eye Exam'),
                'frequency' => 'twice (yearly)',
            ],
            [
                'name' => 'COVID Vaccine',
                'slug' => Str::slug('COVID Vaccine'),
                'frequency' => 'once (every 3 months)',
            ],
            [
                'name' => 'General Blood Test',
                'slug' => Str::slug('General Blood Test'),
                'frequency' => 'once (per week)',
            ],
            [
                'name' => 'Colon CA Screen',
                'slug' => Str::slug('Colon CA Screen'),
                'frequency' => 'once (per month)',
            ]
        ])
            ->each(function ($careMeasure) {
                CareMeasure::create($careMeasure);
            });
    }
}
