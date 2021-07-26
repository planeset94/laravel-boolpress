<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $categories=['Programming', 'Automation', 'Web design', 'Best Practice'];
       foreach($categories as $category){
           $cat=new Category();
           $cat->name=$category;
           
       }
    }
}