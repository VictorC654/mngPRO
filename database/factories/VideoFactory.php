<?php

namespace Database\Factories;
use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $client = Client::factory()->create();
        return [
            'theme' => $this->faker->sentence(),
            'client_id' => $client->id,
            'client' => $client->name,
            'profit' => $this->faker->numberBetween(150,500),
            'duration_in_minutes' => $this->faker->numberBetween(30, 160)
        ];
    }
}
