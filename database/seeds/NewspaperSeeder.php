<?php

use Illuminate\Database\Seeder;
use App\Article;
use App\Author;
use Carbon\Carbon;
use Faker\Generator as Faker;

class NewspaperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker) {
        
        for ($i=0;$i<56;$i++) {

            $articleObj = new Article();
            $articleObj->title = $faker->sentences(1, true);
            $articleObj->subtitle = $faker->sentences(2, true);
            $articleObj->description = $faker->paragraph(12);
            $articleObj->date = $faker->date();
            $articleObj->save();

            $authorObj = new Author();
            $authorObj->authorName = $faker->name();
            $authorObj->authorPfp = 'http://cdn.onlinewebfonts.com/svg/img_258083.png';
            $authorObj->save();
        }
    }
}
