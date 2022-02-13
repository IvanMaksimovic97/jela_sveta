<?php

use App\Tag;
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
        DB::transaction(function() {
            for ($i=1; $i <= 5; $i++) {
                $tag = new Tag();
                $tag->slug = 'tag-'.$i;
                $tag->fill([
                    'title:en' => 'Tag-'.$i,
                    'title:fr' => 'Étiqueter-'.$i
                ]);
                $tag->save();
            }
        });
    }
}
