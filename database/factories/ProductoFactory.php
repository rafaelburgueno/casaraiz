<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Producto>
 */
class ProductoFactory extends Factory
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
            'nombre' => $nombre,
            'descripcion' =>$this->faker->paragraph(),
            'user_id' =>$this->faker->numberBetween(1,10),
            'proveedor' =>$this->faker->name(),
            'precio' =>$this->faker->numberBetween(10,300),
            'stock' =>$this->faker->numberBetween(0,50),

        ];

    }
}
