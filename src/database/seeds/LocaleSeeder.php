<?php

use CoreCave\Laratrans\Models\Locale;
use Illuminate\Database\Seeder;

class LocaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Locale::truncate();

        Locale::create([
            'name' => 'English',
            'code' => 'en',
            'is_default' => true,
        ]);

        Locale::create([
            'name' => 'العربية',
            'code' => 'ar',
            'is_ltr' => false,
        ]);
    }
}
