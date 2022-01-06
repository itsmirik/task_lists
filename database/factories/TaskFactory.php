<?php

namespace Database\Factories;

use App\Models\Card;
use Illuminate\Database\Eloquent\Factories\Factory;
use JetBrains\PhpStorm\ArrayShape;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    #[ArrayShape(['title' => "string", 'has_done' => "bool", 'description' => "string", 'card_id' => "int|mixed"])] public function definition(): array
    {
        return [
            'title'       => $this->faker->title,
            'has_done'    => $this->faker->boolean,
            'description' => $this->faker->text(10),
            'card_id'     => Card::inRandomOrder()->first()->id
        ];
    }
}
