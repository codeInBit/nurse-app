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
            ],
            [
                'name' => 'DM Eye Exam',
                'slug' => Str::slug('DM Eye Exam'),
            ],
            [
                'name' => 'COVID Vaccine',
                'slug' => Str::slug('COVID Vaccine'),
            ],
            [
                'name' => 'General Blood Test',
                'slug' => Str::slug('General Blood Test'),
            ],
            [
                'name' => 'Colon CA Screen',
                'slug' => Str::slug('Colon CA Screen'),
            ]
        ])
            ->each(function ($careMeasure) {
                CareMeasure::create($careMeasure);
            });
    }
}
