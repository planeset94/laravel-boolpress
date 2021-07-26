<?php
use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
           //La caratteristica "name" di ogni riga sarà uguale al nome dell'elemento i-esimo della matrice in cui stai ciclando. 
           $cat->slug = Str::slug($category);
        //    Il metodo slug serve a creare un URL senza spazi, partendo da una stringa data. 
           $cat->save();
           
       }  
    }
}