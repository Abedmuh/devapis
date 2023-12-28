<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AccessLog>
 */
class AccessLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
      $methods = ['GET', 'POST'];
      $codes = [200, 404, 500, null];
      $names = ['John', 'Jane', 'Doe', 'Alice', 'Bob', 'Charlie', 'Eve', 'David', 'Grace', 'Frank'];
      $words = ['home', 'about', 'contact', 'product', 'service', 'blog', 'portfolio', 'gallery', 'faq', 'support'];

      return [
        'username' => fake()->randomElement($names),
        'route' => fake()->randomElement($words),
        'parameters' => implode(' ', fake()->words(5)),
        'method' => fake()->randomElement($methods),
        'code' => fake()->randomElement($codes),
        'message' => implode(' ', fake()->words(5)),
        'ip' => fake()->ipv4,
        'timestamp' => fake()->dateTimeBetween('-360 days', 'now')->format('Y-m-d H:i:s'),
      ];
    }
}
