<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CardTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function get_all_authenticated_user_cards()
    {
        $user = User::first();

        $this->actingAs($user);

        $this->getJson(route('desks.cards.index', $user->desks->first()->id))
            ->assertSee($user->desks->first()->cards->first()->title)
            ->assertOk();
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_a_card()
    {
        $user = User::first();

        $this->actingAs($user);

        $card = $user->desks()->first()->cards()->make([
            'title' => $this->faker->title
        ])->toArray();

        $this->postJson(route('desks.cards.store', $user->desks->first()->id), $card)
            ->assertRedirect(route('desks.cards.index', $user->desks()->first()->id));

        $this->assertDatabaseHas('cards', $card);
    }

    /**
     * @test
     */
    public function show_auth_user_cards()
    {
        $user = User::first();

        $developer = User::whereName('Developer')->first()->desks->first();

        $this->actingAs($user);

        $this->assertAuthenticatedAs($user);

        $desk = $user->desks->first();
        $card = $desk->cards()->first();


        $this->getJson(route('desks.cards.show', [$desk->id, $card->id]))
            ->assertSee($card->title)
            ->assertOk();

        $this->assertNotEquals($developer->id, $card->id);
    }
}
