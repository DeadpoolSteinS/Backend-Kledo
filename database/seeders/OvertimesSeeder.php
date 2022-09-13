<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OvertimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('overtimes')->insert([
        'employee_id' => 1,
        'date' => "2022-09-13",
        'time_started' => "10:00",
        'time_ended' => "12:00"
      ]);

      DB::table('overtimes')->insert([
        'employee_id' => 3,
        'date' => "2022-09-13",
        'time_started' => "07:00",
        'time_ended' => "09:45"
      ]);

      DB::table('overtimes')->insert([
        'employee_id' => 1,
        'date' => "2022-09-13",
        'time_started' => "13:00",
        'time_ended' => "15:30"
      ]);

      DB::table('overtimes')->insert([
        'employee_id' => 2,
        'date' => "2022-09-13",
        'time_started' => "10:30",
        'time_ended' => "14:00"
      ]);
    }
}
