<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'first_name' => $this->faker->firstName(),
            'last_name' => $this->faker->lastName(),
            'occupation' => 'Developper',
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('demo'),
            'isactive' => $this->faker->randomElement([0, 1]),
            'roles_name' => '1',
            'state_id' => 5,
            'city_id' => 4,
            'language_id' => 1,
            'phone' => $this->faker->phoneNumber(),
            'picture' => 'avatar.jpg',
            'address' => $this->faker->address(),
            'code_postale' => $this->faker->postcode(),
            'gender' => $this->faker->randomElement(['male', 'female']),
            'email_verified_at' => now(),
            'last_login_ip' => '127.0.0.1',
            'last_login_at' => now(),
            'isSuperAdmin'=>0,
            'remember_token' => Str::random(10),
        ];
    }


    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(
            fn(array $attributes) => [
                'email_verified_at' => null,
            ],
        );
    }
}
