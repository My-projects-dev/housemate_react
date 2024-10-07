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
                    'password' => '$2a$12$zvG9Z7p/fs/kB1qWIbhkj.66udPnV/rt1HL1vDCs4btdjYJAdoSDW',
                    'image' => null,
                    'role' => 'admin',
                    'remember_token' => null,
                    'created_at' => '2024-04-04 16:18:14',
                    'updated_at' => '2024-04-24 16:18:14',
                ),
        ));
    }
}
