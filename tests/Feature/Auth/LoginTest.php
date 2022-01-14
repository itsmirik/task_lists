<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Auth;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * @test
     */
    public function authenticating_user()
    {
        Auth::logout();

        $data = [
            'email'    => 'akhmedovmirik@gmail.com',
            'password' => '123123'
        ];

        $this->postJson(route('auth.login-action', $data))
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs(User::first());
    }

    /**
     * @test
     */
    public function is_user_authenticated()
    {
        $user = User::first();

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);
    }
}
