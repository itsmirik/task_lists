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
        $this->getJson(route('desks.cards.tasks.index', [$this->desk->id, $this->card->id]))
            ->assertSee($this->task->title)
            ->assertOk();
    }

    /**
     * @test
     */
    public function authenticated_user_can_create_a_task()
    {
        $task = $this->task->factory()->raw();

        $this->postJson(route('desks.cards.tasks.store', [$this->desk->id, $this->card->id]), $task)
            ->assertRedirect('/dashboard/desks');

        $this->assertDatabaseHas('tasks', $task);
    }

    /**
     * @test
     */
    public function authenticated_user_can_view_a_task()
    {
        $this->getJson(route('desks.cards.tasks.show', [
            $this->desk->id,
            $this->card->id,
            $this->task->id
        ]))->assertSee($this->task->title)->assertOk();

        $this->assertEquals($this->task->card_id, $this->card->id);

    }
}
