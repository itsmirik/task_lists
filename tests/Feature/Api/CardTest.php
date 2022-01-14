<?php

namespace Tests\Feature\Api;

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
        $this->getJson(route('desks.cards.index', $this->desk->id))
            ->assertSee($this->card->title)
            ->assertOk();
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_a_card()
    {
        $card = $this->card->factory()->raw();

        $this->postJson(route('desks.cards.store', $this->desk->id), $card)
            ->assertRedirect(route('desks.cards.index', $this->desk->id));

        $this->assertDatabaseHas('cards', $card);
    }

    /**
     * @test
     */
    public function show_auth_user_cards()
    {
        $this->getJson(route('desks.cards.show', [$this->desk, $this->card]))
            ->assertSee($this->card->title)
            ->assertOk();
    }
}
