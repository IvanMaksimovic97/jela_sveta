<?php

use App\Language;
use App\Tag;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $languages = Language::all()->pluck('locale')->toArray();

        DB::transaction(function() use ($languages) {
            for ($i=1; $i <= 5; $i++) {
                $tag = new Tag();
                $tag->slug = 'tag-'.$i;

                $data = [];
                foreach ($languages as $lang) {
                    $fakerLang = Factory::create($lang.'_'.strtoupper($lang));
                    $data['title:'.$lang] = $fakerLang->companySuffix;
                }

                $tag->fill($data);
                $tag->save();
            }
        });
    }
}
