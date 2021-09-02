<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class EmployeeControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_view()
    {

        $response = $this->get('/Companies');

        $response->assertStatus(200);
    }

    public function test_input(){

        $response = $this->json('POST', '/addEmployee',
        ['first_name' => 'test_fname',
        'last_name'=>'test_lname',
        'company_id'=>'1',
        'email'=>'test@gmail.com',
        'phone'=>'123',

                    ]);

        $response->assertStatus(500);

    }
}
