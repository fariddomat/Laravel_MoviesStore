<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovieComment extends Model
{
      //
      protected $guarded=[];

      public function user()
      {
          return $this->belongsTo(User::class);
      }

      public function replies()
      {
          return $this->hasMany(MovieComment::class, 'parent_id');
      }

}
