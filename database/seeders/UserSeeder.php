<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $useradmin = User::create([
            'name' => 'Soy el Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'fullaccess' => 'yes'
        ]);

        $profileadmin = Profile::create([
            'firstname' => 'Admin',
            'lastname' => 'Admin',
            'address' => 'Admin 512',
            'phone_number' => '999999999',
            'profession' => 'Administrator',
            'user_id' => $useradmin->id,
        ]);
    }
}
