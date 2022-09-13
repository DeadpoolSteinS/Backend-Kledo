<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('employees')->insert([
        'name' => "Novaldi Sandi",
        'salary' => 2000000
      ]);

      DB::table('employees')->insert([
        'name' => "Kazuto Kirigaya",
        'salary' => 2500000
      ]);

      DB::table('employees')->insert([
        'name' => "Hikigaya Hachiman",
        'salary' => 3000000
      ]);

      DB::table('employees')->insert([
        'name' => "Sakuta Azusagawa",
        'salary' => 4000000
      ]);
    }
}
