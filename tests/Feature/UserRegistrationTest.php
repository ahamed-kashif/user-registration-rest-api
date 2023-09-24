<?php

namespace Tests\Feature;

use App\Mail\NewUserRegistered;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class UserRegistrationTest extends TestCase
{
    /**
     * test users can register.
     */
    public function test_users_can_register(): void
    {
        ini_set("memory_limit","188M");

    //calling api
        $response = $this->post('/api/register',[
            'name' => 'test user',
            'email' => 'test@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);
        $response->assertStatus(200);
    }
    /**
     * test users have to pass input validation for registration.
     */
    public function test_users_can_not_register_without_validation(): void
    {
        //calling api
        $response = $this->post('/api/register',[
            'name' => 'test user',
            'email' => 'test@test.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
        ]);
        $response->assertStatus(400);
    }

    /**
     * test new registered users get welcome email.
     */
    public function test_new_registered_user_gets_welcome_email(): void
    {
        Mail::fake();

        // Simulate user registration
        $user = User::create(
            [
                'name' => 'test1 user',
                'email' => 'test1@test.com',
                'password' => '12345678'
            ]
        );

        Mail::assertQueued(NewUserRegistered::class);
    }


}
