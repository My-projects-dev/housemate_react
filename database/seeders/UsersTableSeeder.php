<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
            \DB::table('users')->delete();

            \DB::table('users')->insert(array (
                0 =>
                    array (
                        'id' => 1,
                        'name' => 'Anar',
                        'email' => 'admin@admin.az',
                        'email_verified_at' => '2024-04-04 16:18:14',
                        'password' => '$2y$12$PL0wLYq20JrAJu1d3KjDrOUJwMX9QF8dSp9XINNs18B8YjJ4lgnIW',
                        'remember_token' => null,
                        'created_at' => '2024-04-04 16:18:14',
                        'updated_at' => '2024-04-24 16:18:14',
                    ),
            ));
    }
}
