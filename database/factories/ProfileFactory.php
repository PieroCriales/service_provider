<?php

namespace Database\Factories;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Profile::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'firtsname' =>$this->faker->sentence(1),
            'lastname' =>$this->faker->sentence(1),
            'address' =>$this->faker->address,
            'phone_number' =>$this->faker->phoneNumber(),
            'profession' =>$this->faker->sentence(1)
        ];
    }
}
