<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $fillable=['title','text','intro','author','picture','time', 'category_id'];   

    public function categories(){
        return $this->belongsTo(Category::class);
    }

}