<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ShuffleParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shuffle_id' => 1,
            'discord_username' => $this->faker->name(),
            'twitter_username' => $this->faker->name(),
            'wallet_address' => Str::random(18), // password
            'ip_address' => mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255) . "." . mt_rand(0, 255),
        ];
    }
}
