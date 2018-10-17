<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //specifying explicitly table name

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'body',
        'category_id'
    ];

    // a post belongs to the user (inverse relationship)
    public function user(){
        return $this->belongsTo('App\User');
    }

    // a post belongs to the category
    public function category(){
        return $this->belongsTo('App\Categories');
    }
}
