<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $nombre = $this->faker->words(rand(2,8), true);
        return [
            'slug' => Str::slug($nombre, '-'),
            'titulo' => $nombre,
            'html' => '<p>' . $this->faker->paragraph() . '</p>',
            'user_id' =>$this->faker->numberBetween(1,10),

        ];
    }
}
