<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MedicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('medications')->insert([
            'id' => 1,
            'name' => "A-Medication",
            'description' => "Lorem ipsum dolor",
            'price' => 1, 
        ]);

        DB::table('medications')->insert([
            'id' => 2,
            'name' => "B-Medication",
            'description' => "Lorem ipsum dolor",
            'price' => 2, 
        ]);
        DB::table('medications')->insert([
            'id' => 3,
            'name' => "C-Medication",
            'description' => "Lorem ipsum dolor",
            'price' => 3, 
        ]);
        DB::table('medications')->insert([
            'id' => 4,
            'name' => "D-Medication",
            'description' => "Lorem ipsum dolor",
            'price' => 4, 
        ]);
        DB::table('medications')->insert([
            'id' => 5,
            'name' => "E-Medication",
            'description' => "Lorem ipsum dolor",
            'price' => 5, 
        ]);

       

    }
}
