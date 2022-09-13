<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_employee()
    {
        $response = $this->post('/api/employees', [
          'name' => 'Novaldi Sandi Ago',
          'salary' => 2500000
        ]);

        $response->assertStatus(200);
    }

    // karena fungsi diatas sudah memasukkan 'Novaldi Sandi Ago'
    // maka ekspektasi status sekarang harus 400
    public function test_create_employee_with_not_unique_name()
    {
        $response = $this->post('/api/employees', [
          'name' => 'Novaldi Sandi Ago',
          'salary' => 2500000
        ]);

        $response->assertStatus(400);
    }

    public function test_create_employee_with_name_less_than_2_char()
    {
        $response = $this->post('/api/employees', [
          'name' => 'N',
          'salary' => 2500000
        ]);

        $response->assertStatus(400);
    }

    public function test_create_employee_with_salary_less_than_2juta()
    {
        $response = $this->post('/api/employees', [
          'name' => 'Novaldi Sandi',
          'salary' => 1000000
        ]);

        $response->assertStatus(400);
    }

    public function test_create_employee_with_salary_more_than_10juta()
    {
        $response = $this->post('/api/employees', [
          'name' => 'Novaldi Sandi',
          'salary' => 20000000
        ]);

        $response->assertStatus(400);
    }

    public function test_create_employee_with_name_not_string()
    {
        $response = $this->post('/api/employees', [
          'name' => 23,
          'salary' => 1000000
        ]);

        $response->assertStatus(400);
    }

    public function test_create_employee_with_salary_not_integer()
    {
        $response = $this->post('/api/employees', [
          'name' => 'Novaldi Sandi',
          'salary' => 'BENG'
        ]);

        $response->assertStatus(400);
    }

    public function test_create_employee_without_name()
    {
        $response = $this->post('/api/employees', [
          'salary' => 1000000
        ]);

        $response->assertStatus(400);
    }

    public function test_create_employee_without_salary()
    {
        $response = $this->post('/api/employees', [
          'name' => 'Novaldi Sandi'
        ]);

        $response->assertStatus(400);
    }
}
