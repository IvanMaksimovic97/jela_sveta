<?php

use App\Language;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = [
            ['name' => 'English', 'locale' => 'en', 'created_at' => Carbon::now()],
            ['name' => 'French', 'locale' => 'fr', 'created_at' => Carbon::now()],
        ];

        Language::insert($languages);
    }
}
