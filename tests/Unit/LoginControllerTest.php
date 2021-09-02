<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;



class LoginControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_login()
    {

        // $this->visit();
        // $this->assertTrue(true);
        $response = $this->get('/login');

        $response->assertStatus(200);



    }


}
