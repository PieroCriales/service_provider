<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            'name' => 'Betson'
        ]);

        DB::table('rooms')->insert([
            'name' => 'DoradoBet'
        ]);

        DB::table('rooms')->insert([
            'name' => 'SolBet'
        ]);

        DB::table('rooms')->insert([
            'name' => 'InkaBet'
        ]);
    }
}
