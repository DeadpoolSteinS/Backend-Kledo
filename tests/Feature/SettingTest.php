<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SettingTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_update_setting_to_1()
    {
        $response = $this->patch('/api/settings', [
          'key' => 'overtime_method',
          'value' => 1
        ]);

        $response->assertStatus(200);
    }

    public function test_update_setting_to_2()
    {
        $response = $this->patch('/api/settings', [
          'key' => 'overtime_method',
          'value' => 2
        ]);

        $response->assertStatus(200);
    }

    public function test_update_setting_with_key_not_overtime_method()
    {
        $response = $this->patch('/api/settings', [
          'key' => 'overtime_abstract',
          'value' => 1
        ]);

        $response->assertStatus(400);
    }

    // tidak ada id reference yang sama dengan value
    public function test_update_setting_with_invalid_value()
    {
        $response = $this->patch('/api/settings', [
          'key' => 'overtime_method',
          'value' => 5
        ]);

        $response->assertStatus(400);
    }
}
