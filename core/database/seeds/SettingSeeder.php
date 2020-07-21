<?php

use App\Setting;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([

            "start_date" => Carbon::tomorrow(),

            "end_date" => Carbon::tomorrow()->addDays(3),

            "location" => "mirpur 10"

        ]);
    }
}
