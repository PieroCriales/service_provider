<?php

namespace Database\Factories;

use App\Models\Profile;
use App\Models\User;
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
            'firstname' =>$this->faker->sentence(1),
            'lastname' =>$this->faker->sentence(1),
            'address' =>$this->faker->address,
            'phone_number' =>$this->faker->phoneNumber(),
            'profession' =>$this->faker->sentence(1),
            'user_id'=>User::factory()
        ];
    }
}
