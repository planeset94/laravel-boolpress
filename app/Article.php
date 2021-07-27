<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='articles';
    protected $fillable=['category_id','title','text','intro','author','picture','time'];   

    public function categories(){
        return $this->belongsTo(Category::class);
    }

}