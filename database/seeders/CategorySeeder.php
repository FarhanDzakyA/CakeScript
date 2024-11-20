<?php

namespace Database\Seeders;
use DB;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'id_category' => 1,
                'category_name'=> 'Bread',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 2,
                'category_name' => 'Cake',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 3,
                'category_name' => 'Donut',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_category' => 4,
                'category_name' => 'Pastry and Danish',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
