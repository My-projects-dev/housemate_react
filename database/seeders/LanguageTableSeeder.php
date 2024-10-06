<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('languages')->delete();


        \DB::table('languages')->insert(array (
            0 =>
                array (
                    'id' => 1,
                    'language' => 'Arabic',
                    'lang_code' => 'ar',
                    'country_phone_code'=> '+971',
                    'currency' => 'AED',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            1 =>
                array (
                    'id' => 2,
                    'language' => 'Azerbaijani',
                    'lang_code' => 'az',
                    'country_phone_code'=> '+994',
                    'currency' => 'AZN',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            2 =>
                array (
                    'id' => 3,
                    'language' => 'English',
                    'lang_code' => 'en',
                    'country_phone_code'=> '+994',
                    'currency' => 'AZN',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            3 =>
                array (
                    'id' => 4,
                    'language' => 'Hindi',
                    'lang_code' => 'hi',
                    'country_phone_code'=> '+994',
                    'currency' => 'AZN',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            4 =>
                array (
                    'id' => 5,
                    'language' => 'Russian',
                    'lang_code' => 'ru',
                    'country_phone_code'=> '+994',
                    'currency' => 'AZN',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
            5 =>
                array (
                    'id' => 6,
                    'language' => 'Turkish',
                    'lang_code' => 'tr',
                    'country_phone_code'=> '+994',
                    'currency' => 'TRY',
                    'created_at' => '2024-04-15 12:08:18',
                    'updated_at' => '2024-05-15 12:08:18',
                ),
        ));
    }
}
