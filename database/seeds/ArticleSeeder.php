<?php
use App\Article;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        
        for ($i=0; $i<10; $i++) { 
            $article=new Article();
            $article->title=$faker->realText($maxNbChars = 20, $indexSize = 2);
            $article->intro=$faker->realText($maxNbChars = 50, $indexSize = 2);
            $article->text=$faker->realText($maxNbChars = 500, $indexSize = 2);
            $article->author=$faker->name($gender = null);
            $article->picture=$faker->imageUrl(100,100, 'Article', true);
            $article->time=$faker->numberBetween(1,24);
            $article->save();        
    
        }

    }
}