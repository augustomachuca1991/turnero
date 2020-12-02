<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // return [
        //     'name' => $this->faker->name,
        //     'email' => $this->faker->unique()->safeEmail,
        //     'email_verified_at' => now(),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'remember_token' => Str::random(10),
        // ];
        return [
            'name' => 'Michael Scofield',
            'email' => 'Scofield@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$dCi/jTNX3M3A.N7x11yWDuZYGlxzvqUHzL48lmRgfqsIFlY9VE9Iu', // 12345678
            'remember_token' => Str::random(10),
        ];
    }
}
