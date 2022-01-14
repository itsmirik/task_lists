<?php

namespace Tests;

use App\Models\Card;
use App\Models\Desk;
use App\Models\Task;
use App\Models\User;
use Hash;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\helpers\FactoryFunction;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, RefreshDatabase, FactoryFunction;

    protected User $user;
    protected User $developer;
    protected Desk $desk;
    protected Card $card;
    protected Task $task;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = $this->createUser([
            'name'     => 'Mirsaid Akhmedov',
            'email'    => 'akhmedovmirik@gmail.com',
            'password' => Hash::make('123123')
        ]);

        $this->developer = $this->createUser([
            'name'     => 'Developer',
            'email'    => 'developer@test.com',
            'password' => Hash::make('developer')
        ]);

        $this->actingAs($this->user);

        $this->desk = $this->createDeskFor($this->user);
        $this->card = $this->createCardFor($this->desk);
        $this->task = $this->createTaskFor($this->card);
    }
}
