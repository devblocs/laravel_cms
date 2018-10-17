<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "categories";

    protected $fillable = ['title'];

    // each post has one category
    public function post(){
        return $this->hasOne('App\Post');
    }
}
