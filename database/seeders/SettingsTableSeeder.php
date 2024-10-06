<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        \DB::table('settings')->delete();

        \DB::table('settings')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'status' => 1,
                    'key' => 'email',
                    'static_value' => 'anar@div.edu.az',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-13 13:17:57',
                ),
        ));
    }
}
