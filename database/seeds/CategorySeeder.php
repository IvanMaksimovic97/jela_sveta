<?php

use App\Category;
use App\Language;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
                $category = new Category();
                $category->slug = 'category-'.$i;

                $data = [];
                foreach ($languages as $lang) {
                    $fakerLang = Factory::create($lang.'_'.strtoupper($lang));
                    $data['title:'.$lang] = $fakerLang->company;
                }

                $category->fill($data);
                $category->save();
            }
        });
    }
}
