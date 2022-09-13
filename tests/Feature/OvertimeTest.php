<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OvertimeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_overtime()
    {
        $response = $this->post('/api/overtimes', [
          'employee_id' => 1,
          'date' => '2022-09-13',
          'time_started' => '10:08',
          'time_ended' => '12:09'
        ]);

        $response->assertStatus(200);
    }

    public function test_create_overtime_with_employee_id_not_integer()
    {
        $response = $this->post('/api/overtimes', [
          'employee_id' => 'satu',
          'date' => '2022-09-13',
          'time_started' => '10:08',
          'time_ended' => '12:09'
        ]);

        $response->assertStatus(400);
    }

    public function test_create_overtime_with_invalid_employee_id()
    {
        $response = $this->post('/api/overtimes', [
          'employee_id' => 1000,
          'date' => '2022-09-13',
          'time_started' => '10:08',
          'time_ended' => '12:09'
        ]);

        $response->assertStatus(400);
    }

    public function test_create_overtime_with_date_is_not_date_type()
    {
        $response = $this->post('/api/overtimes', [
          'employee_id' => 1,
          'date' => 3,
          'time_started' => '10:08',
          'time_ended' => '12:09'
        ]);

        $response->assertStatus(400);
    }

    public function test_create_overtime_with_time_ended_is_less_than_time_started()
    {
        $response = $this->post('/api/overtimes', [
          'employee_id' => 1,
          'date' => '2022-09-13',
          'time_started' => '10:08',
          'time_ended' => '08:09'
        ]);

        $response->assertStatus(400);
    }

    public function test_create_overtime_with_time_started_not_format_HH_mm()
    {
        $response = $this->post('/api/overtimes', [
          'employee_id' => 1,
          'date' => '2022-09-13',
          'time_started' => '10:08:09',
          'time_ended' => '12:09'
        ]);

        $response->assertStatus(400);
    }

    public function test_create_overtime_with_time_ended_not_format_HH_mm()
    {
        $response = $this->post('/api/overtimes', [
          'employee_id' => 1,
          'date' => '2022-09-13',
          'time_started' => '10:08',
          'time_ended' => '12:09:43'
        ]);

        $response->assertStatus(400);
    }

    public function test_get_overtime_pay()
    {
        $response = $this->get('/api/overtime-pays/calculate/2022-09');

        $response->assertStatus(200);
    }
}
