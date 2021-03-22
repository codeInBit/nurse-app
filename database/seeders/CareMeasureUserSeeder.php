<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\CareMeasure;
use App\Models\ReasonStatus;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CareMeasureUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Populate reasons for in progress status
        $users = User::patient()->inRandomOrder()->limit(5)->get();
        $preventiveCareMeasures = CareMeasure::inRandomOrder()->limit(1)->pluck('id');
        $reasons = $users->each(function ($users) use ($preventiveCareMeasures) {
            $users->preventiveCareMeasures()->attach(
                $preventiveCareMeasures,
                [
                    'id' => Str::uuid(),
                    'reason_status_id' => ReasonStatus::inRandomOrder()->first()->id
                ]
            );
        });
    }
}
