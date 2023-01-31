<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GangaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => 'Iphone 14',
            'description' => "Hoy Apple ha renovado su familia de smartphones,
            y lo ha hecho con un nuevo integrante. No tenemos iPhone 14 mini, pero lo que sí tendremos
            es el nuevo el iPhone 14 Plus, que es en esencia un iPhone 14 de gran formato y que llega acompañando a
            los también recién presentados iPhone 14, iPhone 14 Pro, y iPhone 14 Pro Max.",
            'url' => "https://www.pccomponentes.com/apple-iphone-14-128gb-blanco-estrella-libre?campaigntype=pmax&gclid=CjwKCAiAzp6eBhByEiwA_gGq5FXQWaAibgboDi_-vunC0VVT8gxHsE9ooncg6oJzfC23UDoRGnF0oxoCNSMQAvD_BwE",
            'category' => Categoria::inRandomOrder()->first(),
            'likes' => $this->faker->numberBetween(0,1000),
            'dislikes' => $this->faker->numberBetween(0,1000),
            'price' => $this->faker->numberBetween(1000,2000),
            'price_sale' => $this->faker->numberBetween(1000,2000),
            'available' => $this->faker->boolean,
            'user_id' => User::inRandomOrder()->first()
        ];
    }
}
