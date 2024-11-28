<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'nama' => 'Saepudin Udin Kesmol',
                'email' => 'saepudinudin@gmail.com',
                'email_verified_at' => now(),
                'alamat' => 'Jl. Raya No. 1 Kel. Aselole Kec. Asiap',
                'no_hp' => '081234567890',
                'password' => bcrypt('123456'),
                'role' => 'User',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Admin Tampan',
                'email' => 'admintampan@gmail.com',
                'email_verified_at' => now(),
                'alamat' => 'Jl. Oda Nobunaga No. 1945, RT 004 / RW 016, Gatka, Primorsk, Erangel',
                'no_hp' => '081398765432',
                'password' => bcrypt('123456'),
                'role' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
