<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SettingTranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('setting_translations')->delete();

        \DB::table('setting_translations')->insert(array(
//            0 =>
//                array(
//                    'id' => 1,
//                    'setting_id' => 1,
//                    'value' => 'لغة الأحلام',
//                    'locale' => 'ar',
//                ),

        ));
    }
}
