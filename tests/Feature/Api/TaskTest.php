<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use WithFaker;

    /**
     * @test
     */
    public function authenticated_user_can_view_own_tasks()
    {
        $user = User::first();

        $this->actingAs($user);

        $desk = $user->desks->first();
        $card = $desk->cards()->first();

        $this->getJson(route('desks.cards.tasks.index', [$desk->id, $card->id]))
            ->assertSee(auth()->user()->desks()->first()->cards()->first()->tasks()->first()->title)
            ->assertOk();
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_a_task()
    {
        $user = User::first();

        $this->actingAs($user);

        $task = $user->desks()->first()->cards()->first()->tasks()->make([
            'title'       => $this->faker->title,
            'has_done'    => false,
            'description' => $this->faker->text,
        ])->toArray();

        $this->postJson(route('desks.cards.tasks.store', [
            $user->desks->first()->id,
            $user->desks->first()->cards()->first()->id
        ]), $task)
            ->assertRedirect('/dashboard/desks');

        $this->assertDatabaseHas('tasks', $task);
    }
}
