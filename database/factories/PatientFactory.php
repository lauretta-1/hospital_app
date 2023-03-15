<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['single','married'];
        return [
            'first_name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'next_of_kin_name' => $this->faker->name(),
            'next_of_kin_phone' => $this->faker->phoneNumber(),
            'phone' => $this->faker->phoneNumber(),
            'dob' => now(),
            'marital_status' => $this->faker->randomElement($status) ,
            'hospital_no' => rand(1231,7879),
            'address' => $this->faker->streetAddress(),
        ];
    }
}
