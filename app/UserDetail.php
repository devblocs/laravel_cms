<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
    protected $table = 'user_details';

    protected $fillable = [
        'bio',
        'location',
        'age',
        'profile_pic'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
