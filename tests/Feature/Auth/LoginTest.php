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
        $this->withExceptionHandling();
        Auth::logout();
        $data = [
            'email'    => 'akhmedovmirik@gmail.com',
            'password' => '123123'
        ];
        $this->postJson(route('auth.login-action', $data))
            ->assertRedirect(route('dashboard'));

        $this->assertAuthenticatedAs(User::first());
    }
}
