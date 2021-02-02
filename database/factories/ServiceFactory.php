<?php

namespace Database\Factories;

use App\Models\Service;
use App\Models\User;
use App\Models\TypeService;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illumninate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' =>$this->faker->catchPhrase,
            'description' =>$this->faker->paragraph(),
            'price' =>$this->faker->numberBetween(1500,7000),
            'type_service_id'=>TypeService::all()->random()->id,
            'user_id'=>User::all()->random()->id,
            'picture_path'=>'perfil/'. $this->faker->image('public/storage/perfil',640,480,null,false)
        ];
    }
}
