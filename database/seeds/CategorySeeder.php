<?php

use App\Category;
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
        DB::transaction(function() {
            for ($i=1; $i <= 5; $i++) {
                $category = new Category();
                $category->slug = 'category-'.$i;
                $category->fill([
                    'title:en' => 'Category-'.$i,
                    'title:fr' => 'Catégorie-'.$i
                ]);
                $category->save();
            }
        });
    }
}
