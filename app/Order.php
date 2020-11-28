<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $guarded=[];

    public function users()
    {
        return $this->belongsTo(User::class,'user_id');

    }// end of users

    public function movies()
    {
        return $this->belongsTo(Movie::class,'movies_id');

    }// end of movies
}
