<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_services')->insert([
            'category' => 'Distribución'
        ]);

        DB::table('type_services')->insert([
            'category' => 'Producción'
        ]);

        DB::table('type_services')->insert([
            'category' => 'Sociales'
        ]);

        DB::table('type_services')->insert([
            'category' => 'Personales'
        ]);
    }
    
}
