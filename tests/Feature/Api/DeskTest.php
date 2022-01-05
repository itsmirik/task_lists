<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Tests\TestCase;

class DeskTest extends TestCase
{
    /**
     * @test
     */
    public function show_all_user_desks()
    {
        $this->actingAs(User::first());

        $this->getJson(route('desks.index'))
            ->assertOk()
            ->assertSee(auth()->user()->desks->first()->title);
    }

    /**
     * @test
     */

    public function user_can_create_a_desk()
    {
        $this->actingAs(User::first());

        $desk = auth()->user()->desks()->make([
            'title' => 'test desk'
        ])->toArray();

        $this->postJson(route('desks.store'), $desk)->assertRedirect(route('desks.index'));

        $this->assertDatabaseHas('desks', $desk);
    }

    /**
     * @test
     */
    public function show_a_authenticated_user_desk()
    {
        $this->actingAs(User::first());

        $developer = User::whereName('Developer')->get();

        $desk = auth()->user()->desks->first();

        $this->getJson(route('desks.show', $desk->id))->assertOk()->assertSee($desk->title);

        $this->assertNotEquals($developer->first()->desks->first()->id, $desk->id);
    }
}
