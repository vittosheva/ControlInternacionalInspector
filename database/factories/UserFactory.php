<?php

namespace Database\Factories;

use App\Models\Persona\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $data = personaGenerationHelper();

        return [
            'company_id' => $data->companyId,
            'persona_type' => $data->personaType,
            'identification_type' => $data->identificationType,
            'identification_number' => $data->identificationNumber,
            'name' => $data->name,
            'email' => $data->fake->unique()->safeEmail,
            'password' => $data->password,
            'telephone' => $data->fake->phoneNumber,
            'address' => $data->fake->address,
            'country_id' => 64,
            'is_active' => 1,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
