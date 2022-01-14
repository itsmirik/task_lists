<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;

class DeskTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function authenticated_user_can_view_own_desks()
    {
        $this->getJson(route('desks.index'))
            ->assertSee($this->desk->title)
            ->assertOk();
    }

    /**
     * @test
     */

    public function user_can_create_a_desk()
    {
        $this->actingAs(User::first());

        $desk = [
            'title' => $this->faker->paragraph(),
        ];

        $this->postJson(route('desks.store'), $desk)->assertRedirect(route('desks.index'));

        $this->assertDatabaseHas('desks', $desk);
    }

    /**
     * @test
     */
    public function show_a_authenticated_user_desk()
    {
        $this->getJson(route('desks.show', $this->desk->id))
            ->assertJson([
                'id'    => $this->desk->id,
                'title' => $this->desk->title
            ])->assertOk();
    }
}
