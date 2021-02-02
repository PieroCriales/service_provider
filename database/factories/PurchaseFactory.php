<?php


namespace Database\Factories;


use App\Models\Purchase;
use App\Models\Rating;
use App\Models\Service;
use App\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition()
    {
        $seller_confirmation = random_int(0,1);
        $customer_confirmation = random_int(0,1);
        $status = 0;
        $paymented = 0;

        if ($seller_confirmation || $customer_confirmation) {
            $paymented = 1;
            $status = random_int(0, 1);
        }

        if ($seller_confirmation && $customer_confirmation) {
            $status = 1;
        }
        $service = Service::all()->random();
        $user = null;
        while ($user == null || $user->id == $service->user_id) {
            $user = User::all()->random();
        }
        return [
            'code' => $this->faker->md5,
            'due_date' => $this->faker->dateTime($max = 'now', $timezone = null),
            'seller_confirmation' => $seller_confirmation,
            'customer_confirmation' => $customer_confirmation,
            'status' => $status,
            'service_id' => $service->id,
            'user_id' => $user->id,
            'rating_id' => Rating::factory(),
            'paymented' => $paymented
        ];
    }
}
