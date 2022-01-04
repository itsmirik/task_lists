<?php

namespace Tests\Feature\Api;

use App\Models\Desk;
use Tests\TestCase;

class DeskTest extends TestCase
{
    /**
     * @test
     */
    public function show_all_desks()
    {
        Desk::factory()->make();

        $this->getJson(route('desks.index'))
            ->assertOk()
            ->assertSee([
                'id' => 1
            ]);
    }

    /**
     * @test
     */

    public function create_a_desk()
    {
        $desk = Desk::factory()->make()->toArray();

        $this->postJson(route('desks.store'), $desk)->assertCreated();

        $this->assertDatabaseHas('desks', $desk);
    }
}
