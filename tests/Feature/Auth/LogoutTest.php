<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Auth;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    /**
     * @test
     */
    public function user_logout()
    {
        $this->actingAs(User::first());

        $this->assertAuthenticatedAs(User::first());

        $this
            ->get(route('auth.logout'))
            ->assertRedirect(route('auth.login-page'));

        $this->assertGuest();
    }
}
