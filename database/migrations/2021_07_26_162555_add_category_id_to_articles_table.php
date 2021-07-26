<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCategoryIdToArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('articles', function (Blueprint $table) {
        //aggiungo una nuova colonna "category_id" al Model Article. Tale colonna può essere nulla 
        // e va post obbligatoriamente dopo l'id primario.   
    $table->unsignedBigInteger('category_id')->nullable()->after('id');
        //dico a Laravel che la nuova colonna è una chiave esterna, rispetto a che cosa ('id'), 
        // di quale tabella ('categories') e che tale colonna non può essere eliminata.
        $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('articles', function (Blueprint $table) {
            //Elimino la chiave ester
       $table->dropForeign('articles_category_id_foreign');
           //Poi elimino la colonna
        $table->dropColumn('category_id');
           
        });
    }
}