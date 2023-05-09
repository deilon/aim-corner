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
            'username' => $this->faker->userName(),
            'email' => $this->faker->unique()->safeEmail(),
            'password' => '$2y$10$2BAv1ZMktIOvin8NphwQwOT5Em1mj7nKnX3LLSjpi5gM42jqCou9.', // password123#
            'firstname' => $this->faker->firstNameMale(),
            'lastname' => $this->faker->lastName(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'course' => '1st Year BSIS',
            'role' => 'student',
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
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
