<?php

namespace Database\Seeders;
use App\Models\User;
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
       User::factory(10)->create();
       
       Service::factory(50)->create();
    // Profile::factory()->create();
    }
}
