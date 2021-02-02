<?php


namespace Database\Factories;


use App\Models\Rating;
use App\Models\TypeRating;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Rating::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->paragraph,
            'type_rating_id' => TypeRating::all()->random()->id,
        ];
    }
}
