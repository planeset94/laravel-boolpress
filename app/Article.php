<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Article extends Model
{
    protected $table='articles';
    protected $fillable=['category_id','title','text','intro','author','picture','time'];   

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tags():BelongsToMany 
    {
        return $this->belongsToMany(Tag::class); 
    }

}