<?php

namespace Tests\helpers;

use App\Models\User;
use App\Models\Desk;
use App\Models\Card;
use App\Models\Task;

trait FactoryFunction
{
    /**
     * make faker User;
     *
     * @param array $attributes
     * @return array
     */
    public function makeUser(array $attributes = []): array
    {
        return User::factory()
            ->raw($attributes);
    }

    /**
     * create faker User
     *
     * @param array $attributes
     * @return User
     */
    public function createUser(array $attributes = []): User
    {
        return User::factory()
            ->create($attributes);
    }

    /**
     * create Desk for User
     *
     * @param User $user
     * @param array $attributes
     * @return Desk
     */
    public function createDeskFor(User $user, array $attributes = []): Desk
    {
        $attributes['user_id'] = $user->id;

        return Desk::factory()
            ->create($attributes);
    }

    /**
     * create Card for User
     *
     * @param Desk $desk
     * @param array $attributes
     * @return Card
     */
    public function createCardFor(Desk $desk, array $attributes = []): Card
    {
        $attributes['desk_id'] = $desk->id;

        return Card::factory()
            ->create($attributes);
    }

    /**
     * create Task for User
     *
     * @param Card $card
     * @param array $attributes
     * @return Task
     */
    public function createTaskFor(Card $card, array $attributes = []): Task
    {
        $attributes['card_id'] = $card->id;

        return Task::factory()
            ->create($attributes);
    }

}