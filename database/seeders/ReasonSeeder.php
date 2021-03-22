<?php

namespace Database\Seeders;

use App\Models\Reason;
use Illuminate\Database\Seeder;

class ReasonSeeder extends Seeder
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
                'title' => 'Other',
                'title_field' => ['Other'],
                'created_at' => '2021-03-21 10:58:31'
            ],
            [
                'title' => 'Patient needs assistance in getting vaccine administered',
                'title_field' => NULL,
                'created_at' => '2021-03-20 10:58:31'
            ],
            [
                'title' => 'Patient unsure if they want to get it',
                'title_field' => NULL,
                'created_at' => '2021-03-19 10:58:31'
            ],
            [
                'title' => 'Plans on getting it. Patient indicate they will get it on the following:',
                'title_field' => ['Date', 'Location', 'Transport'],
                'created_at' => '2021-03-18 10:58:31'
            ]
        ])
            ->each(function ($reason) {
                Reason::create($reason);
            });
    }
}
