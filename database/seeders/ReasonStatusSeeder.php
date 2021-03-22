<?php

namespace Database\Seeders;

use App\Models\Reason;
use App\Models\Status;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ReasonStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Populate reasons for in progress status
        $inProgressStatus = Status::where('slug', 'in-progress')->first();
        $reasons = Reason::all()->each(function ($reason) use ($inProgressStatus) {
            $reason->statuses()->attach($inProgressStatus->id, ['id' => Str::uuid()]);
        });

        //Populate reasons for refused status
        $refusedStatus = Status::where('slug', 'refused')->first();
        $reasons = Reason::all()->each(function ($reason) use ($refusedStatus) {
            $reason->statuses()->attach($refusedStatus->id, ['id' => Str::uuid()]);
        });
    }
}
