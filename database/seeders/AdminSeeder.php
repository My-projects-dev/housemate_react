<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('admins')->delete();

        \DB::table('admins')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'name' => 'Anar',
                    'email' => 'admin@admin.az',
                    'email_verified_at' => null,
                    'password' => '$2y$12$PL0wLYq20JrAJu1d3KjDrOUJwMX9QF8dSp9XINNs18B8YjJ4lgnIW',
                    'image' => null,
                    'role' => 'admin',
                    'remember_token' => null,
                    'created_at' => '2024-04-04 16:18:14',
                    'updated_at' => '2024-04-24 16:18:14',
                ),
        ));
    }
}
