<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $tags=['Web', 'Marketing', 'Tutorial', 'Market Analysis', 'Bugs'];
            foreach ($tags as $tag){
            $new_tag=new Tag();
            $new_tag->name=$tag;
            $new_tag->slug= Str::slug($slug);
            $new_tag->save();
        }
    }
}
