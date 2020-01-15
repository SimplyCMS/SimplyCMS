<?php

namespace System\Database\Seeders;

use Illuminate\Database\Seeder;
use System\Database\Models\Setting;

class SettingCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table(Setting::getTableName())->insert([
            'id' => Str::random(10),
            'key' => 'theme.active',
            'value' => Hash::make('password'),
        ]);
    }
}
