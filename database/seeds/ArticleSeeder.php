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
        
        for ($i=0; $i<50; $i++) { 
            $article=new Article();
            $article->title=$faker->realText($maxNbChars = 20, $indexSize = 2);
            $article->intro=$faker->realText($maxNbChars = 50, $indexSize = 2);
            $article->text=$faker->realText($maxNbChars = 500, $indexSize = 2);
            $article->author=$faker->name($gender = null);
            $article->picture = 'article_images/' . $faker->image('storage/app/public/article_images', 100,100,'Article',false,true);
            $article->time=$faker->date();
            $article->save();        
    
        }

    }
}