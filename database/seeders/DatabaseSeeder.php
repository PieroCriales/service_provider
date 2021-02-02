<?php

namespace Database\Seeders;
use App\Models\Purchase;
use App\Models\Service;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::makeDirectory('perfil');
        Profile::factory()->count(10)->create();
        $this->call(TypeServiceSeeder::class);
        Service::factory(50)->create();
        $this->call(TypeRatingSeeder::class);
        Purchase::factory(200)->create();
        $this->call(UserSeeder::class);
    }
}
